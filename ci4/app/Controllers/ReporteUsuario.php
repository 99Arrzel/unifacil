<?php 
namespace App\Controllers;
use App\Models\ModeloReporteUsuario;

class ReporteUsuario extends BaseController
{
	public function ReporteUsuarioActivo()
	{
		$usuario= new ModeloReporteUsuario();
        $datosusuario = $usuario->listarUsuariosActivos();
       // $mensaje = session('mensaje');

        $data = [
            "usuario" => $datosusuario
        ];
        echo view('templates/header');//navbar
        return view('reporte_usuarios_activos',$data);
	}

}