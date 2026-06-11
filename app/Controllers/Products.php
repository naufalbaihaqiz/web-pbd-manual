<?php

namespace App\Controllers;

class Products extends BaseController
{
    public function index()
    {
        $produkModel = new \App\Models\ProdukModel();
        
        $sort = $this->request->getGet('sort');
        $keyword = $this->request->getGet('keyword'); // Menangkap kata kunci

        // Jika ada pencarian dari halaman full
        if (!empty($keyword)) {
            $produkModel->like('nama_produk', $keyword);
        }

        // Logika Sorting Database
        switch ($sort) {
            case 'price_low':
                $produkModel->orderBy("CAST(REPLACE(REPLACE(harga_jual, 'Rp', ''), '.', '') AS UNSIGNED)", 'ASC', false);
                break;
            case 'price_high':
                $produkModel->orderBy("CAST(REPLACE(REPLACE(harga_jual, 'Rp', ''), '.', '') AS UNSIGNED)", 'DESC', false);
                break;
            case 'latest':
                $produkModel->orderBy('status_produk', 'DESC');
                break;
            case 'popularity':
                $produkModel->orderBy('nama_produk', 'ASC');
                break;
            default:
                $produkModel->orderBy('nama_produk', 'ASC');
                break;
        }
        
        $data = [
            'produk_jasa' => $produkModel->paginate(8, 'produk'),
            'pager' => $produkModel->pager,
            'current_sort' => $sort,
            'keyword' => $keyword // Kirim keyword kembali ke view agar nempel di form
        ];
        
        $data = array_merge($this->viewData ?? [], $data);

        return view('products', $data);
    }

    // Fungsi Baru untuk Live Search di dalam Modal (AJAX)
    public function searchAjax()
    {
        $keyword = $this->request->getGet('keyword');
        $produkModel = new \App\Models\ProdukModel();
        
        if (empty($keyword)) {
            return $this->response->setJSON([]);
        }

        // Cari produk berdasar nama, limit 6 agar modal tidak kepanjangan
        $results = $produkModel->like('nama_produk', $keyword)->findAll(6); 
        
        return $this->response->setJSON($results);
    }

    public function detail($nama)
    {
        $produkModel = new \App\Models\ProdukModel();
        
        $produk = $produkModel->where('nama_produk', urldecode($nama))->first();

        if (!$produk) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'produk' => $produk
        ];
        
        $data = array_merge($this->viewData ?? [], $data);

        return view('product_detail', $data);
    }
}