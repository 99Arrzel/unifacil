<?php

namespace App\Controllers;

use App\Models\ModeloFacultad;

class Facultad extends BaseController 
{
    public function index()
    {
        echo view('templates/header');//navbar
        $facultad = new ModeloFacultad();
        $datos = $facultad->listarFacultades();
        $mensaje = session('mensaje');
        $data = [
            "datos" => $datos,//datos
            "mensaje"=>$mensaje//mensaje para la alerta
        ];
        return view('abm_facultad',$data);
        
        
    }

    public function crearFacultad()
    {
        //print_r($_POST); se fija si los datos llegan
        $datos = [
            "nombreFacultad"=>$_POST['nombreFacultad']//nombre del campo de la base=> nombre o id del input
        ];
        $facultad = new ModeloFacultad(); // nuevo objeto facultad
        $respuesta = $facultad->insertarFacultad($datos); //manda los datos al modelo
        if($respuesta > 0){ 
            return redirect()->to(base_url().'/facultad')->with('mensaje','1');
        }else {
            return redirect()->to(base_url().'/facultad')->with('mensaje','0');
        }
    }
    public function actualizarFacultad()
    {
        //print_r($_POST); se fija si los datos llegan
        $datos = [
            "idtblFacultad"=>$_POST['idtblFacultad'],//el update es lo mismo que el insert pero hay que adjuntar el ID a modificar
            "nombreFacultad"=>$_POST['nombreFacultad']//nombre del campo de la base=> nombre o id del input
        ];
        $idtblFacultad=$_POST['idtblFacultad'];//id para la consulta
        $facultad = new ModeloFacultad(); // nuevo objeto facultad

        $respuesta = $facultad->actualizarFacultad($datos,$idtblFacultad);

        if($respuesta){//if true
            return redirect()->to(base_url().'/facultad')->with('mensaje','2');
        }else {
            return redirect()->to(base_url().'/facultad')->with('mensaje','3');
        }
    }

    public function obtenerNombreFacultad($idtblFacultad)
    {
        echo view('templates/header');//navbar
        $data =["idtblFacultad" => $idtblFacultad];//mismo que en la linea 61
        $facultad = new ModeloFacultad();
        $respuesta=$facultad->obtenerNombreFacultad($data);

        $datos=[
            "datos" => $respuesta
        ];

        return view('actualizarFacultad',$datos);
    }

    public function eliminarFacultad($idtblFacultad)
    {
        $facultad = new ModeloFacultad();
        $data = ["idtblFacultad" => $idtblFacultad];

        $respuesta = $facultad->eliminarFacultad($data);

        if($respuesta){//if true
            return redirect()->to(base_url().'/facultad')->with('mensaje','4');
        }else {
            return redirect()->to(base_url().'/facultad')->with('mensaje','5');
        }
    }
}
