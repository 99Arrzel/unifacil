<?php 
namespace App\Controllers;
use App\Models\ModeloExamenes;

class Examenes_lista extends BaseController
{
	public function index()
	{
		echo view('templates/header');
		$ModeloExamenes = new ModeloExamenes();
		//$examen = new Libros(); //Esto no hace nada, que hace acá XDD 
		$data['examenes']=$ModeloExamenes->getExamenes();
		return view("examenes_lista",$data);
	}

	public function ReporteUsuario()
	{
		$usuario= new ModeloExamenes();
        $datosusuario = $usuario->listarUsuariosExamenes();
       // $mensaje = session('mensaje');

        $data = [
            "usuario" => $datosusuario
        ];
        echo view('templates/header');//navbar
        return view('reporte_usuarios_examenes',$data);
	}

	public function crearUsuarioExamen(){
        $datosusex = [
            "tblUsuario_idtblUsuario"=>$_POST['idtblUsuario'],
            "tblExamen_idtblExamen"=>$_POST['idtblExamen'],
			"fecha"=>$_POST['fecha']
        ];

        $examen = new ModeloExamenes();
        $examen->insertarUsuarioExamen($datosusex);
		$enlace = $_POST['dirDoc'];
		return redirect()->to($enlace);
    }


}