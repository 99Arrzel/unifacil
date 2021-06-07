<?php

namespace App\Controllers;

use App\Models\ModeloAutor;

class Autor extends BaseController 
{
    public function index()
    {
        echo view('templates/header');//navbar
        $autor = new ModeloAutor();
        $datos = $autor->listarAutores();
        $mensaje = session('mensaje');
        $data = [
            "datos" => $datos,//datos
            "mensaje"=>$mensaje//mensaje para la alerta
        ];
        return view('abm_autor',$data);
        
        
    }

    public function crearAutor()
    {
        //print_r($_POST); se fija si los datos llegan
        $datos = [
            "nombreAutor"=>$_POST['nombreAutor']//nombre del campo de la base=> nombre o id del input
        ];
        $autor = new ModeloAutor(); // nuevo objeto autor
        $respuesta = $autor->insertarAutor($datos); //manda los datos al modelo
        if($respuesta > 0){ 
            return redirect()->to(base_url().'/autor')->with('mensaje','1');
        }else {
            return redirect()->to(base_url().'/autor')->with('mensaje','0');
        }

        //haciendo pruebas de los autoemails

    }
    public function actualizarAutor()
    {
        //print_r($_POST); se fija si los datos llegan
        $datos = [
            "idtblAutor"=>$_POST['idtblAutor'],//el update es lo mismo que el insert pero hay que adjuntar el ID a modificar
            "nombreAutor"=>$_POST['nombreAutor'],
            "estado"=>$_POST['estado']//nombre del campo de la base=> nombre o id del input
        ];
        $idtblAutor=$_POST['idtblAutor'];//id para la consulta
        $autor = new ModeloAutor(); // nuevo objeto autor

        $respuesta = $autor->actualizarAutor($datos,$idtblAutor);

        if($respuesta){//if true
            return redirect()->to(base_url().'/autor')->with('mensaje','2');
        }else {
            return redirect()->to(base_url().'/autor')->with('mensaje','3');
        }
    }

    public function obtenerNombreAutor($idtblAutor)
    {
        echo view('templates/header');//navbar
        $data =["idtblAutor" => $idtblAutor];//mismo que en la linea 61
        $autor = new ModeloAutor();
        $respuesta=$autor->obtenerNombreAutor($data);

        $datos=[
            "datos" => $respuesta
        ];

        return view('actualizarAutor',$datos);
    }

    public function eliminarAutor($idtblAutor)
    {
        $autor = new ModeloAutor();
        $data = ["idtblAutor" => $idtblAutor];

        $respuesta = $autor->eliminarAutor($data);

        if($respuesta){//if true
            return redirect()->to(base_url().'/autor')->with('mensaje','4');
        }else {
            return redirect()->to(base_url().'/autor')->with('mensaje','5');
        }
    }
}
