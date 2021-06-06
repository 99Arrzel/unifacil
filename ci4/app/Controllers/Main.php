<?php namespace App\Controllers;
use App\Libraries\GroceryCrud;


class main extends BaseController
{
    public function index()
    {
        $crud = new GroceryCrud();
        $crud->setTable('tblUsuario');
        $output = $crud->render();
        return $this->_exampleOutput($output);
    }
    private function _exampleOutput($output = null)
    {
        return view('example', (array)$output);
    }

}