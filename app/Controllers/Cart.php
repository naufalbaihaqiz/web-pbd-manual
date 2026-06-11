<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\DetailCartModel;

class Cart extends BaseController
{
    protected $cartModel;
    protected $detailCartModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->detailCartModel = new DetailCartModel();
    }

    private function getCartData($email)
    {
        $cart = $this->cartModel->where('email_pengguna', $email)->first();
        if (!$cart) {
            return ['cart' => null, 'items' => []];
        }
        $items = $this->detailCartModel->where('id_cart', $cart['id_cart'])->findAll();
        
        $formattedItems = [];
        foreach ($items as $item) {
            $id = md5($item['nama_produk']);
            $formattedItems[$id] = [
                'id_detail' => $item['id_detail'],
                'name'      => $item['nama_produk'],
                'price'     => $item['harga_jual_cart'],
                'qty'       => $item['jumlah_produk_cart'],
                'image'     => $item['gambar_produk']
            ];
        }
        
        return ['cart' => $cart, 'items' => $formattedItems];
    }

    private function recalculateCartTotals($cartId)
    {
        $items = $this->detailCartModel->where('id_cart', $cartId)->findAll();
        $subtotal = 0;
        foreach ($items as $item) {
            $subtotal += ($item['harga_jual_cart'] * $item['jumlah_produk_cart']);
        }
        
        $cart = $this->cartModel->find($cartId);
        $discount = 0;
        if ($cart['coupon'] === 'PROMO10K') {
            $discount = 10000;
        }
        
        $total = max(0, $subtotal - $discount);
        
        $this->cartModel->update($cartId, [
            'subtotal_cart' => $subtotal,
            'total_cart'    => $total
        ]);
        
        return [
            'subtotal' => $subtotal,
            'total'    => $total,
            'discount' => $discount
        ];
    }

    public function index()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/')->with('error', 'Silakan login terlebih dahulu untuk melihat keranjang.');
        }

        $email = $session->get('email_pengguna');
        $cartData = $this->getCartData($email);
        $cart = $cartData['cart'];
        $items = $cartData['items'];

        $subtotal = $cart ? $cart['subtotal_cart'] : 0;
        $total = $cart ? $cart['total_cart'] : 0;
        $applied_coupon = $cart ? $cart['coupon'] : '';
        $discount = ($applied_coupon === 'PROMO10K') ? 10000 : 0;

        $data = [
            'cart'           => $items,
            'subtotal'       => $subtotal,
            'discount'       => $discount,
            'total'          => $total,
            'applied_coupon' => $applied_coupon
        ];

        return view('cart', $data);
    }

    public function add()
    {
        $session = session();
        
        if (!$session->get('isLoggedIn')) {
            return redirect()->back()->with('error', 'Silakan login terlebih dahulu.');
        }

        $email = $session->get('email_pengguna');
        $cart = $this->cartModel->where('email_pengguna', $email)->first();
        
        if (!$cart) {
            $this->cartModel->insert([
                'email_pengguna' => $email,
                'coupon' => null,
                'subtotal_cart' => 0,
                'total_cart' => 0
            ]);
            $cartId = $this->cartModel->getInsertID();
        } else {
            $cartId = $cart['id_cart'];
        }

        $idHash = $this->request->getPost('id');
        $name   = $this->request->getPost('name');
        $price  = $this->request->getPost('price');
        $image  = $this->request->getPost('image');

        $existingItem = $this->detailCartModel->where('id_cart', $cartId)
                                              ->where('nama_produk', $name)
                                              ->first();

        if ($existingItem) {
            $this->detailCartModel->update($existingItem['id_detail'], [
                'jumlah_produk_cart' => $existingItem['jumlah_produk_cart'] + 1
            ]);
        } else {
            $this->detailCartModel->insert([
                'id_cart'            => $cartId,
                'nama_produk'        => $name,
                'gambar_produk'      => $image,
                'jumlah_produk_cart' => 1,
                'harga_jual_cart'    => $price
            ]);
        }

        $this->recalculateCartTotals($cartId);
        
        return redirect()->to('/cart')->with('cart_success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function remove($idHash)
    {
        $session = session();
        if (!$session->get('isLoggedIn')) return redirect()->to('/cart');

        $email = $session->get('email_pengguna');
        $cartData = $this->getCartData($email);
        $cart = $cartData['cart'];
        $items = $cartData['items'];

        if ($cart && isset($items[$idHash])) {
            $idDetail = $items[$idHash]['id_detail'];
            $this->detailCartModel->delete($idDetail);
            $this->recalculateCartTotals($cart['id_cart']);
        }

        return redirect()->to('/cart')->with('cart_success', 'Produk berhasil dihapus dari keranjang.');
    }

    public function update()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) return redirect()->to('/cart');

        $email = $session->get('email_pengguna');
        $cartData = $this->getCartData($email);
        $cart = $cartData['cart'];
        $items = $cartData['items'];
        
        $qtys = $this->request->getPost('qty');

        if ($cart && $qtys && is_array($qtys)) {
            foreach ($qtys as $idHash => $qty) {
                if (isset($items[$idHash])) {
                    $qty = (int)$qty;
                    $idDetail = $items[$idHash]['id_detail'];
                    if ($qty > 0) {
                        $this->detailCartModel->update($idDetail, ['jumlah_produk_cart' => $qty]);
                    } else {
                        $this->detailCartModel->delete($idDetail);
                    }
                }
            }
            $this->recalculateCartTotals($cart['id_cart']);
        }
        
        return redirect()->to('/cart')->with('cart_success', 'Keranjang berhasil diperbarui!');
    }

    public function applyCoupon()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) return redirect()->to('/cart');

        $email = $session->get('email_pengguna');
        $cart = $this->cartModel->where('email_pengguna', $email)->first();
        
        $code = trim($this->request->getPost('coupon_code'));

        if ($cart) {
            if (strtoupper($code) === 'PROMO10K') {
                $this->cartModel->update($cart['id_cart'], ['coupon' => 'PROMO10K']);
                $this->recalculateCartTotals($cart['id_cart']);
                $session->setFlashdata('coupon_success', 'Kupon berhasil digunakan!');
            } else {
                $session->setFlashdata('coupon_error', 'Kupon tidak ditemukan.');
            }
        }
        return redirect()->to('/cart');
    }

    public function removeCoupon()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) return redirect()->to('/cart');

        $email = $session->get('email_pengguna');
        $cart = $this->cartModel->where('email_pengguna', $email)->first();
        
        if ($cart) {
            $this->cartModel->update($cart['id_cart'], ['coupon' => null]);
            $this->recalculateCartTotals($cart['id_cart']);
        }

        $session->setFlashdata('coupon_success', 'Kupon berhasil dilepas.');
        return redirect()->to('/cart');
    }

    public function checkout()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) return redirect()->to('/cart');

        $email = $session->get('email_pengguna');
        $cartData = $this->getCartData($email);
        
        if (empty($cartData['items'])) {
            return redirect()->to('/cart');
        }

        $cart = $cartData['cart'];
        $discount = ($cart['coupon'] === 'PROMO10K') ? 10000 : 0;

        $data = [
            'cart'           => $cartData['items'],
            'subtotal'       => $cart['subtotal_cart'],
            'discount'       => $discount,
            'total'          => $cart['total_cart'],
            'applied_coupon' => $cart['coupon']
        ];

        return view('checkout', $data);
    }

    public function processCheckout()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) return redirect()->to('/cart');

        $emailPengguna = $session->get('email_pengguna');
        $cartData = $this->getCartData($emailPengguna);
        
        if (empty($cartData['items'])) {
            return redirect()->to('/cart');
        }

        $post = $this->request->getPost();
        
        if ($emailPengguna) {
            $penggunaModel = new \App\Models\PenggunaModel();
            $penggunaModel->update($emailPengguna, [
                'nama_depan'    => $post['first_name'] ?? '',
                'nama_belakang' => $post['last_name'] ?? '',
                'company'       => $post['company'] ?? '',
                'country'       => $post['country'] ?? '',
                'jalan'         => $post['address_1'] ?? '',
                'detail_alamat' => $post['address_2'] ?? '',
                'kota'          => $post['city'] ?? '',
                'provinsi'      => $post['province'] ?? '',
                'kode_pos'      => $post['postcode'] ?? '',
                'no_telp'       => $post['phone'] ?? '',
            ]);
        }

        $cart = $cartData['cart'];
        $items = $cartData['items'];

        $orderNumber = mt_rand(1000, 9999);
        $paymentMethod = 'Direct bank transfer'; 
        
        $pesananModel = new \App\Models\PesananModel();
        $pesananModel->insert([
            'nomor_order'       => $orderNumber,
            'email_pengguna'    => $emailPengguna,
            'tanggal_pembelian' => date('Y-m-d H:i:s'),
            'metode_pembayaran' => $paymentMethod,
            'subtotal'          => $cart['subtotal_cart'],
            'coupon'            => $cart['coupon'] ?? '',
            'total'             => $cart['total_cart'],
            'catatan'           => $post['order_notes'] ?? '',
            'no_rek_penerima'   => null,
            'nama_depan'        => $post['first_name'] ?? '',
            'nama_belakang'     => $post['last_name'] ?? '',
            'company'           => $post['company'] ?? '',
            'jalan'             => $post['address_1'] ?? '',
            'detail_alamat'     => $post['address_2'] ?? '',
            'kota'              => $post['city'] ?? '',
            'provinsi'          => $post['province'] ?? '',
            'kode_pos'          => $post['postcode'] ?? '',
            'country'           => $post['country'] ?? '',
            'no_telp'           => $post['phone'] ?? ''
        ]);

        $detailModel = new \App\Models\DetailPesananModel();
        foreach($items as $item) {
            $detailModel->insert([
                'nomor_order' => $orderNumber,
                'nama_produk' => $item['name'],
                'jumlah'      => $item['qty']
            ]);
        }

        $orderData = [
            'order_number'   => $orderNumber,
            'date'           => date('F j, Y'),
            'total'          => $cart['total_cart'],
            'payment_method' => $paymentMethod,
            'billing'        => $post,
            'items'          => $items
        ];

        $session->setFlashdata('order_data', $orderData);
        
        // Hapus cart dari database setelah checkout
        $this->detailCartModel->where('id_cart', $cart['id_cart'])->delete();
        $this->cartModel->delete($cart['id_cart']);

        return redirect()->to('/checkout/received');
    }

    public function orderReceived()
    {
        $session = session();
        $orderData = $session->getFlashdata('order_data');

        if (!$orderData) {
            return redirect()->to('/');
        }

        return view('order_received', ['order' => $orderData]);
    }
}