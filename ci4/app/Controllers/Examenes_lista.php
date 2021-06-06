<?php 
namespace App\Controllers;
use App\Models\ModeloExamenes;

class Examenes_lista extends BaseController
{
	public function index()
	{
		echo view('templates/header');
		$ModeloExamenes = new ModeloExamenes();
		//$libro = new Libros(); //Esto no hace nada, que hace acá XDD 
		$data['examenes']=$ModeloExamenes->getExamenes();
		return view("examenes_lista",$data);
	}



}