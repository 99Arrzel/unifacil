<?php

namespace App\Controllers;

class Stat extends BaseController 
{
    public function index()
    {
        echo view('header');
        return view('stats');
    }
}