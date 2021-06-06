<?php

namespace App\Controllers;

use App\Models\ModeloImagen;

class Imagen extends BaseController 
{
    public function index()
    {
        echo view('templates/header');//navbar
        $imagen = new ModeloImagen();
        $datos = $imagen->listarImagenes();
        $mensaje = session('mensaje');
        $data = [
            "datos" => $datos,//datos
            "mensaje"=>$mensaje//mensaje para la alerta
        ];
        return view('abm_imagen',$data);
        
        
    }

    public function crearImagen()
    {
        //print_r($_POST); se fija si los datos llegan
        $datos = [
            "nombreImagen"=>$_POST['nombreImagen'],
            "dirImagen"=>$_POST['dirImagen'],
            "estado"=>$_POST['estado']//nombre del campo de la base=> nombre o id del input
        ];
        $imagen = new ModeloImagen(); // nuevo objeto imagen
        $respuesta = $imagen->insertarImagen($datos); //manda los datos al modelo
        if($respuesta > 0){ 
            return redirect()->to(base_url().'/imagen')->with('mensaje','1');
        }else {
            return redirect()->to(base_url().'/imagen')->with('mensaje','0');
        }
    }
    public function actualizarImagen()
    {
        //print_r($_POST); se fija si los datos llegan
        $datos = [
            "idtblImagen"=>$_POST['idtblImagen'],//el update es lo mismo que el insert pero hay que adjuntar el ID a modificar
            "nombreImagen"=>$_POST['nombreImagen'],
            "dirImagen"=>$_POST['dirImagen'],
            "estado"=>$_POST['estado']//nombre del campo de la base=> nombre o id del input
        ];
        $idtblImagen=$_POST['idtblImagen'];//id para la consulta
        $imagen = new ModeloImagen(); // nuevo objeto imagen

        $respuesta = $imagen->actualizarImagen($datos,$idtblImagen);

        if($respuesta){//if true
            return redirect()->to(base_url().'/imagen')->with('mensaje','2');
        }else {
            return redirect()->to(base_url().'/imagen')->with('mensaje','3');
        }
    }

    public function obtenernombreImagen($idtblImagen)
    {
        echo view('templates/header');//navbar
        $data =["idtblImagen" => $idtblImagen];//mismo que en la linea 61
        $imagen = new ModeloImagen();
        $respuesta=$imagen->obtenernombreImagen($data);

        $datos=[
            "datos" => $respuesta
        ];

        return view('actualizarImagen',$datos);
    }

    public function eliminarImagen($idtblImagen)
    {
        $imagen = new ModeloImagen();
        $data = ["idtblImagen" => $idtblImagen];

        $respuesta = $imagen->eliminarImagen($data);

        if($respuesta){//if true
            return redirect()->to(base_url().'/imagen')->with('mensaje','4');
        }else {
            return redirect()->to(base_url().'/imagen')->with('mensaje','5');
        }
    }
}
