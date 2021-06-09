<?php

namespace App\Controllers;

use App\Models\ModeloLibroFiltro;

class LibroFiltro extends BaseController 
{
    public function index()
    {
        echo view('templates/header');//navbar
        //TODO::cambios aqui
        //$datoslibro = (new ModeloLibroFiltro())->listarlibros();//Envio todo el puto directorio dentro de dir
        $libro= new ModeloLibroFiltro();
        $datoslibro = $libro->listarLibros();
        $mensaje = session('mensaje');
    
        $imagen = new ModeloLibroFiltro();
        $datosimagen = $imagen->listarImagenes();

        $autor = new ModeloLibroFiltro();
        $datosautor = $autor->listarAutores();

        $tag =  new ModeloLibroFiltro();
        $datostag = $tag->listarTags();

        $filtro = new ModeloLibroFiltro();
        $datosfiltro = $filtro->listarFiltros();

        $data = [
            "libro" => $datoslibro,//datosdir
            "mensaje"=>$mensaje,
            "imagen" => $datosimagen,
            "autor" => $datosautor,
            "tag" => $datostag,
            "filtro" =>$datosfiltro
            //mensaje para la alerta
        ];
        return view('abm_libro_filtro',$data);

        
        /*
        $libro = new ModeloLibroFiltro();
        $datos = $libro->listarLibros();
        $mensaje = session('mensaje');
        $imagen = new ModeloLibroFiltro();
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
        $libro = new ModeloLibroFiltro(); // nuevo objeto libro
        $respuesta = $libro->insertarLibro($datos); //manda los datos al modelo
        if($respuesta > 0){ 
            return redirect()->to(base_url().'/libro')->with('mensaje','1');
        }else {
            return redirect()->to(base_url().'/libro')->with('mensaje','0');
        }
    }
    public function actualizarLibro()
    {
        
        print_r($_POST); 
        $datos = [
            "idtblLibro"=>$_POST['idtblLibro'],//el update es lo mismo que el insert pero hay que adjuntar el ID a modificar
            "nombreLibro"=>$_POST['nombreLibro'],
            "year"=>$_POST['year'],
            "edicion"=>$_POST['edicion'],
            "dirDoc"=>$_POST['dirDoc'],
            "estado"=>$_POST['estado']
            //nombre del campo de la base=> nombre o id del input
        ];//PARA CADA TABLA ANIADIR UN ARRAY
        $datosimg = [
            "idtblImagen"=>$_POST['idtblImagen'],
            "nombreImagen"=>$_POST['nombreImagen']
        ];

        $idtblLibro=$_POST['idtblLibro'];//id para la consulta
        $libro = new ModeloLibroFiltro(); // nuevo objeto libro
        $respuesta = $libro->actualizarLibro($datos,$idtblLibro);

        $idtblImagen=$_POST['idtblImagen'];
        $imagen = new ModeloLibroFiltro();
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
        $libro = new ModeloLibroFiltro(); // nuevo objeto libro
        $respuesta = $libro->eliminarLibroLogic($datos,$idtblLibro);

        if($respuesta){//if true
            return redirect()->to(base_url().'/libro')->with('mensaje','2');
        }else {
            return redirect()->to(base_url().'/libro')->with('mensaje','3');
        }
    }

    */
   
    public function obtenernombreLibro($idtblLibro,$idtblImagen,$IDsAutores)//aca se reciben las ids de las tablas llamadas de la vista
    {
        echo view('templates/header');//navbar
        $data =["idtblLibro" => $idtblLibro];//mismo que en la linea 61
        $libro = new ModeloLibroFiltro();
        $respuesta=$libro->obtenernombreLibro($data);

        $dataimg = ["idtblImagen" => $idtblImagen];
        $imagen = new ModeloLibroFiltro();
        $respuestaimg=$imagen->obtenerNombreImagen($dataimg);

        $dataaut = ["IDsAutores" => $IDsAutores];
        $autor = new ModeloLibroFiltro();
        $respuestaaut=$autor->obtenerNombreAutor($dataaut);

        $datos=[
            "datos" => $respuesta,
            "datosimg" =>$respuestaimg,
            "datosaut" =>$respuestaaut
        ];

        return view('actualizarLibroFiltro',$datos);
    }

    public function eliminarLibro($idtblLibro)
    {
        $libro = new ModeloLibroFiltro();
        $data = ["idtblLibro" => $idtblLibro];

        $respuesta = $libro->eliminarLibro($data);

        if($respuesta){//if true
            return redirect()->to(base_url().'/libro')->with('mensaje','4');
        }else {
            return redirect()->to(base_url().'/libro')->with('mensaje','5');
        }
    }
}
