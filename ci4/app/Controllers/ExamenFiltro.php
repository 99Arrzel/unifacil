<?php

namespace App\Controllers;

use App\Models\ModeloExamenFiltro;

class ExamenFiltro extends BaseController 
{
    public function index()
    {
        echo view('templates/header');//navbar
        //TODO::cambios aqui
        //$datosexamen = (new ModeloExamenFiltro())->listarlibros();//Envio todo el puto directorio dentro de dir
        $examen= new ModeloExamenFiltro();
        $datosexamen = $examen->listarExamenes();
        $mensaje = session('mensaje');
    
        $imagen = new ModeloExamenFiltro();
        $datosimagen = $imagen->listarImagenes();

        $autor = new ModeloExamenFiltro();
        $datosautor = $autor->listarAutores();

        $tag =  new ModeloExamenFiltro();
        $datostag = $tag->listarTags();

        $filtro = new ModeloExamenFiltro();
        $datosfiltro = $filtro->listarFiltros();

        $data = [
            "examen" => $datosexamen,//datosdir
            "mensaje"=>$mensaje,
            "imagen" => $datosimagen,
            "autor" => $datosautor,
            "tag" => $datostag,
            "filtro" =>$datosfiltro
            //mensaje para la alerta
        ];
        return view('abm_examen_filtro',$data);

        
        /*
        $examen = new ModeloExamenFiltro();
        $datos = $examen->listarLibros();
        $mensaje = session('mensaje');
        $imagen = new ModeloExamenFiltro();
        $datosImg = $imagen->listarImagenes();
        $data = [
            "datos" => $datos,//datos
            "datosImg" => $datosImg,
            "mensaje"=>$mensaje//mensaje para la alerta
        ];


        return view('abm_libro',$data);
        */
        
    }

    public function crearExamenFiltro()
    {
        //print_r($_POST); se fija si los datos llegan
        //xd
        $miId = (new ModeloExamenFiltro())->ultimoID();
        $miId = $miId[0]['XD'];
        $datos = [
            "idtblExamen"=> $miId,
            "nombreExamen"=>$_POST['nombreExamen'],
            "year"=>$_POST['year'],
            "paralelo"=>$_POST['paralelo'],
            "dirDoc"=>$_POST['dirDoc'],
            "tblImagen_idtblImagen"=>$_POST['tblImagen_idtblImagen'],
            "tblAutor_idtblAutor"=>$_POST['IDAutor'],
            "estado"=>$_POST['estado']
            //nombre del campo de la base=> nombre o id del input
        ];


        $datostag = [
            "tblTag_idtblTag"=>$_POST['IDTag'],
            "tblExamen_idtblExamen"=>$miId,
        ];

        $datosfil = [
            "idfiltroFinal_Union"=>$_POST['IDFiltro'],
            "idtblExamen_Union"=>$miId,
        ];

        $examen = new ModeloExamenFiltro(); // nuevo objeto examen
        $respuesta = $examen->insertarExamen($datos); //manda los datos al modelo


        $tag = new ModeloExamenFiltro();
        $tag->insertarTag($datostag);

        $filtro = new ModeloExamenFiltro();
        $filtro->insertarFiltro($datosfil);
        
        //$imagen = new ModeloExamenFiltro($datosimg);
        //$respuestaimg = $imagen->insertarImagen($datosimg);

        if($respuesta > 0){ 
            return redirect()->to(base_url().'/examenfiltro')->with('mensaje','1');
        }else {
            return redirect()->to(base_url().'/examenfiltro')->with('mensaje','0');
        }
    }
    public function actualizarExamenFiltro()
    {
        
        print_r($_POST); 
        $datos = [
            "idtblExamen"=>$_POST['idtblExamen'],//el update es lo mismo que el insert pero hay que adjuntar el ID a modificar
            "nombreLibro"=>$_POST['nombreLibro'],
            "year"=>$_POST['year'],
            "paralelo"=>$_POST['paralelo'],
            "dirDoc"=>$_POST['dirDoc'],
            "estado"=>$_POST['estado']
            //nombre del campo de la base=> nombre o id del input
        ];//PARA CADA TABLA ANIADIR UN ARRAY
        $datosimg = [
            "idtblImagen"=>$_POST['idtblImagen'],
            "nombreImagen"=>$_POST['nombreImagen']
        ];

        $datosaut =[
            "idtblAutor"=>$_POST['idtblAutor'],
            "nombreAutor"=>$_POST['nombreAutor']
        ];

        $datostag =[
            "idtblTag"=>$_POST['idtblTag'],
            "nombreTag"=>$_POST['nombreTag']
        ];

        $datosfil =[
            "idfiltroFinal"=>$_POST['idfiltroFinal']
        ];

        $idtblExamen=$_POST['idtblExamen'];//id para la consulta
        $examen = new ModeloExamenFiltro(); // nuevo objeto examen

        $respuesta = $examen->actualizarExamen($datos,$idtblExamen);

        $idtblImagen=$_POST['idtblImagen'];
        $imagen = new ModeloExamenFiltro();
        $imagen->actualizarImagen($datosimg,$idtblImagen);

        $idtblAutor=$_POST['idtblAutor'];
        $autor = new ModeloExamenFiltro();
        $autor->actualizarAutor($datosaut,$idtblAutor);

        $idtblTag=$_POST['idtblTag'];
        $tag = new ModeloExamenFiltro();
        $tag->actualizarTag($datostag,$idtblTag);

        $idfiltroFinal=$_POST['idfiltroFinal'];
        $filtro = new ModeloExamenFiltro();
        $filtro->actualizarFiltro($datosfil,$idfiltroFinal);

        if($respuesta){//if true
            return redirect()->to(base_url().'/librofiltro')->with('mensaje','2');
        }else {
            return redirect()->to(base_url().'/librofiltro')->with('mensaje','3');
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
        $examen = new ModeloExamenFiltro(); // nuevo objeto examen
        $respuesta = $examen->eliminarLibroLogic($datos,$idtblLibro);

        if($respuesta){//if true
            return redirect()->to(base_url().'/examen')->with('mensaje','2');
        }else {
            return redirect()->to(base_url().'/examen')->with('mensaje','3');
        }
    }

    */
   
    public function obtenerNombreExamenFiltro($idtblExamen,$idtblImagen,$idtblAutor,$idtblTag,$idfiltroFinal)//aca se reciben las ids de las tablas llamadas de la vista
    {
        echo view('templates/header');//navbar
        $data =["idtblExamen" => $idtblExamen];//mismo que en la linea 61
        $examen = new ModeloExamenFiltro();
        $respuesta=$examen->obtenerNombreExamen($data);

        $dataimg = ["idtblImagen" => $idtblImagen];
        $imagen = new ModeloExamenFiltro();
        $respuestaimg=$imagen->obtenerNombreImagen($dataimg);

        $dataaut = ["idtblAutor" => $idtblAutor];
        $autor = new ModeloExamenFiltro();
        $respuestaaut=$autor->obtenerNombreAutor($dataaut);

        $datatag = ["idtblTag" => $idtblTag];
        $tag = new ModeloExamenFiltro();
        $respuestatag=$tag->obtenerNombreTag($datatag);

        $datafil = ["idfiltroFinal" =>$idfiltroFinal];
        $filtro = new ModeloExamenFiltro();
        $respuestafil=$filtro->obtenerNombreFiltro($datafil);

        $datos=[
            "datos" => $respuesta,
            "datosimg" =>$respuestaimg,
            "datosaut" =>$respuestaaut,
            "datostag" =>$respuestatag,
            "datosfil" =>$respuestafil
        ];

        return view('actualizarExamenFiltro',$datos);
    }

   /* public function eliminarLibro($idtblLibro)
    {
        $examen = new ModeloExamenFiltro();
        $data = ["idtblLibro" => $idtblLibro];

        $respuesta = $examen->eliminarLibro($data);

        if($respuesta){//if true
            return redirect()->to(base_url().'/examen')->with('mensaje','4');
        }else {
            return redirect()->to(base_url().'/examen')->with('mensaje','5');
        }
    } */
}
