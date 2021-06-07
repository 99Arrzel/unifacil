<?php

namespace App\Controllers;

class Stat extends BaseController 
{
    public function index()
    {
        echo view('/stats/index');
    }
}