<?php

namespace App\Controllers;

class Blog extends BaseController
{
    public function index(): string
    {
        $blogModel = new \App\Models\BlogModel();
        
        $data = [
            'blogs' => $blogModel->paginate(6, 'blog'),
            'pager' => $blogModel->pager
        ];
        
        $data = array_merge($this->viewData ?? [], $data);

        return view('blog', $data);
    }

    public function detail($judul)
    {
        $blogModel = new \App\Models\BlogModel();
        
        // Asumsi mencari berdasarkan slug atau judul_blog
        $blog = $blogModel->where('judul_blog', urldecode($judul))->first();

        if (!$blog) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'blog' => $blog
        ];
        
        $data = array_merge($this->viewData ?? [], $data);

        return view('blog_detail', $data);
    }
}