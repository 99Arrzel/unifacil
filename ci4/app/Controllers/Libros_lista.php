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

	public function ReporteUsuario()
	{
		$usuario= new ModeloLibros();
        $datosusuario = $usuario->listarUsuariosLibros();
       // $mensaje = session('mensaje');

        $data = [
            "usuario" => $datosusuario
        ];
        echo view('templates/header');//navbar
        return view('reporte_usuarios_libros',$data);
	}

	public function crearUsuarioLibro(){
        $datosuslib = [
            "tblUsuario_idtblUsuario"=>$_POST['idtblUsuario'],
            "tblLibro_idtblLibro"=>$_POST['idtblLibro'],
			"fecha"=>$_POST['fecha']
        ];

        $libro = new ModeloLibros();
        $libro->insertarUsuarioLibro($datosuslib);
		$enlace = $_POST['dirDoc'];
		return redirect()->to($enlace);
    }

	
}