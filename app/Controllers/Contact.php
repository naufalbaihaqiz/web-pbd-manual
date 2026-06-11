<?php

namespace App\Controllers;

class Contact extends BaseController
{
    public function index(): string
    {
        // Memanggil file app/Views/contact.php
        return view('contact');
    }
}