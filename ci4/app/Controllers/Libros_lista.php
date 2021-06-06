<?php 
namespace App\Controllers;
use App\Models\ModeloLibros;

class Libros_lista extends BaseController
{
	public function index()
	{
		echo view('templates/header'); //Nacbar invocado
		$ModeloLibros = new ModeloLibros();
		//$libro = new Libros(); //Esto no hace nada, que hace acá XDD 
		$data['libros']=$ModeloLibros->getLibros();
		return view("libros_lista",$data);
	}

	/*
	public function product($type)
	{
		echo '<h2>Este es un producto: '.$type.'</h2>';
		//return view('product');
	}
	*/


}