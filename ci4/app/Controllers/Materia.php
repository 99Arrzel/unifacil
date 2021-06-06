<?php

namespace App\Controllers;

use App\Models\ModeloMateria;

class Materia extends BaseController 
{
    public function index()
    {
        echo view('templates/header');//navbar
        $materia = new ModeloMateria();
        $datos = $materia->listarMaterias();
        $mensaje = session('mensaje');
        $data = [
            "datos" => $datos,//datos
            "mensaje"=>$mensaje//mensaje para la alerta
        ];
        return view('abm_materia',$data);
        
        
    }

    public function crearMateria()
    {
        //print_r($_POST); se fija si los datos llegan
        $datos = [
            "nombreMateria"=>$_POST['nombreMateria']//nombre del campo de la base=> nombre o id del input
        ];
        $materia = new ModeloMateria(); // nuevo objeto materia
        $respuesta = $materia->insertarMateria($datos); //manda los datos al modelo
        if($respuesta > 0){ 
            return redirect()->to(base_url().'/materia')->with('mensaje','1');
        }else {
            return redirect()->to(base_url().'/materia')->with('mensaje','0');
        }
    }
    public function actualizarMateria()
    {
        //print_r($_POST); se fija si los datos llegan
        $datos = [
            "idtblMateria"=>$_POST['idtblMateria'],//el update es lo mismo que el insert pero hay que adjuntar el ID a modificar
            "nombreMateria"=>$_POST['nombreMateria']//nombre del campo de la base=> nombre o id del input
        ];
        $idtblMateria=$_POST['idtblMateria'];//id para la consulta
        $materia = new ModeloMateria(); // nuevo objeto materia

        $respuesta = $materia->actualizarMateria($datos,$idtblMateria);

        if($respuesta){//if true
            return redirect()->to(base_url().'/materia')->with('mensaje','2');
        }else {
            return redirect()->to(base_url().'/materia')->with('mensaje','3');
        }
    }

    public function obtenernombreMateria($idtblMateria)
    {
        echo view('templates/header');//navbar
        $data =["idtblMateria" => $idtblMateria];//mismo que en la linea 61
        $materia = new ModeloMateria();
        $respuesta=$materia->obtenernombreMateria($data);

        $datos=[
            "datos" => $respuesta
        ];

        return view('actualizarMateria',$datos);
    }

    public function eliminarMateria($idtblMateria)
    {
        $materia = new ModeloMateria();
        $data = ["idtblMateria" => $idtblMateria];

        $respuesta = $materia->eliminarMateria($data);

        if($respuesta){//if true
            return redirect()->to(base_url().'/materia')->with('mensaje','4');
        }else {
            return redirect()->to(base_url().'/materia')->with('mensaje','5');
        }
    }
}
