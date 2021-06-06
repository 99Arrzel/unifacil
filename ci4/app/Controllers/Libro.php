<?php

namespace App\Controllers;

use App\Models\ModeloLibro;

class Libro extends BaseController 
{
    public function index()
    {
        echo view('templates/header');//navbar
        //TODO::cambios aqui
        //$datoslibro = (new ModeloLibro())->listarlibros();//Envio todo el puto directorio dentro de dir
        $libro= new ModeloLibro();
        $datoslibro = $libro->listarLibros();
        $mensaje = session('mensaje');
    
        $imagen = new ModeloLibro();
        $datosimagen = $imagen->listarImagenes();
        $data = [
            "libro" => $datoslibro,//datosdir
            "mensaje"=>$mensaje,
            "imagen" => $datosimagen
            //mensaje para la alerta
        ];
        return view('abm_libro',$data);

        
        /*
        $libro = new ModeloLibro();
        $datos = $libro->listarLibros();
        $mensaje = session('mensaje');
        $imagen = new ModeloLibro();
        $datosImg = $imagen->listarImagenes();
        $data = [
            "datos" => $datos,//datos
            "datosImg" => $datosImg,
            "mensaje"=>$mensaje//mensaje para la alerta
        ];


        return view('abm_libro',$data);
        */
        
    }

    public function crearLibro()
    {
        //print_r($_POST); se fija si los datos llegan
        $datos = [
            "nombreLibro"=>$_POST['nombreLibro'],
            "year"=>$_POST['year'],
            "edicion"=>$_POST['edicion'],
            "dirDoc"=>$_POST['dirDoc'],
            "tblImagen_idtblImagen"=>$_POST['tblImagen_idtblImagen']
            //nombre del campo de la base=> nombre o id del input
        ];
        $libro = new ModeloLibro(); // nuevo objeto libro
        $respuesta = $libro->insertarLibro($datos); //manda los datos al modelo
        if($respuesta > 0){ 
            return redirect()->to(base_url().'/libro')->with('mensaje','1');
        }else {
            return redirect()->to(base_url().'/libro')->with('mensaje','0');
        }
    }
    public function actualizarLibro()
    {
        //TODO: terminar de aniadir los datos
        print_r($_POST); //se fija si los datos llegan
        $datos = [
            "idtblLibro"=>$_POST['idtblLibro'],//el update es lo mismo que el insert pero hay que adjuntar el ID a modificar
            "nombreLibro"=>$_POST['nombreLibro'],
            "year"=>$_POST['year'],
            "edicion"=>$_POST['edicion'],
            "dirDoc"=>$_POST['dirDoc'],
            "estado"=>$_POST['estado']
            //nombre del campo de la base=> nombre o id del input
        ];
        $datosimg = [
            "idtblImagen"=>$_POST['idtblImagen'],
            "nombreImagen"=>$_POST['nombreImagen']
        ];

        $idtblLibro=$_POST['idtblLibro'];//id para la consulta
        $libro = new ModeloLibro(); // nuevo objeto libro
        $respuesta = $libro->actualizarLibro($datos,$idtblLibro);

        $idtblImagen=$_POST['idtblImagen'];
        $imagen = new ModeloLibro();
        $respuestaimg = $imagen->actualizarImagen($datosimg,$idtblImagen);

        if($respuesta){//if true
            return redirect()->to(base_url().'/libro')->with('mensaje','2');
        }else {
            return redirect()->to(base_url().'/libro')->with('mensaje','3');
        }
    }

    /* me di cuenta que era redundante XD 
    public function eliminarLibroLogic()
    {
        //TODO: terminar de aniadir los datos
        print_r($_POST); //se fija si los datos llegan
        $datos = [
            "idtblLibro"=>$_POST['idtblLibro'],//el update es lo mismo que el insert pero hay que adjuntar el ID a modificar
            "nombreLibro"=>$_POST['nombreLibro'],
            "year"=>$_POST['year'],
            "edicion"=>$_POST['edicion'],
            "dirDoc"=>$_POST['dirDoc'],
            "estado"=>'1'
            //nombre del campo de la base=> nombre o id del input
        ];
        
        $idtblLibro=$_POST['idtblLibro'];//id para la consulta
        $libro = new ModeloLibro(); // nuevo objeto libro
        $respuesta = $libro->eliminarLibroLogic($datos,$idtblLibro);

        if($respuesta){//if true
            return redirect()->to(base_url().'/libro')->with('mensaje','2');
        }else {
            return redirect()->to(base_url().'/libro')->with('mensaje','3');
        }
    }

    */
   
    public function obtenernombreLibro($idtblLibro,$idtblImagen)
    {
        echo view('templates/header');//navbar
        $data =["idtblLibro" => $idtblLibro];//mismo que en la linea 61
        $libro = new ModeloLibro();
        $respuesta=$libro->obtenernombreLibro($data);

        $dataimg = ["idtblImagen" => $idtblImagen];
        $imagen = new ModeloLibro();
        $respuestaimg=$imagen->obtenerNombreImagen($dataimg);

        $datos=[
            "datos" => $respuesta,
            "datosimg" =>$respuestaimg
        ];

        return view('actualizarLibro',$datos);
    }

    public function eliminarLibro($idtblLibro)
    {
        $libro = new ModeloLibro();
        $data = ["idtblLibro" => $idtblLibro];

        $respuesta = $libro->eliminarLibro($data);

        if($respuesta){//if true
            return redirect()->to(base_url().'/libro')->with('mensaje','4');
        }else {
            return redirect()->to(base_url().'/libro')->with('mensaje','5');
        }
    }
}
