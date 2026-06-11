<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $kategoriModel = new \App\Models\KategoriModel();
        $produkModel = new \App\Models\ProdukModel();
        $faqModel = new \App\Models\FaqModel();
        $blogModel = new \App\Models\BlogModel();
        $kelebihanModel = new \App\Models\KelebihanModel();

        $data = [
            'kategori' => $kategoriModel->where('jumlah_produk >', 0)->findAll(),
            'produk_jasa' => $produkModel->where('status_produk', 'Reguler')->findAll(),
            'produk_terbaru' => $produkModel->where('status_produk', 'Terbaru')->findAll(),
            'faqs' => $faqModel->findAll(),
            'blogs' => $blogModel->findAll(),
            'kelebihan' => $kelebihanModel->findAll(),
        ];
        
        $data = array_merge($this->viewData, $data);

        return view('dashboard', $data);
    }
}