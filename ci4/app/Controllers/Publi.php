<?php

namespace App\Controllers;


class Publi extends BaseController 
{
    public function index()
    {
        echo view('templates/header');
        return view('/publi');   
        
        
    }

    
}
