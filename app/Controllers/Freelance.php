<?php

namespace App\Controllers;

class Freelance extends BaseController
{
    public function index(): string
    {
        return view('freelance', $this->viewData);
    }
}
