<?php

namespace App\Controllers;

use App\Models\ModeloLibroRelacion;

class Autor extends BaseController 
{
    public function index()
    {
        echo view('templates/header');//navbar
        $libro= new ModeloLibroRelacion();
        $datoslibro = $libro->listarLibros();
        $mensaje = session('mensaje');

        $autor = new ModeloLibroRelacion();
        $datosautor = $autor->listarAutores();

        $tag =  new ModeloLibroRelacion();
        $datostag = $tag->listarTags();

        $filtro = new ModeloLibroRelacion();
        $datosfiltro = $filtro->listarFiltros();

        $data = [
            "libro" => $datoslibro,//datosdir
            "mensaje"=>$mensaje,
            "autor" => $datosautor,
            "tag" => $datostag,
            "filtro" =>$datosfiltro
            //mensaje para la alerta
        ];
        return view('abm_libro_relacion',$data);

    }

    
    //public function crearLibroRelacion()
    //{
        //print_r($_POST); se fija si los datos llegan
        //xd 
        /*
        $miId = (new ModeloLibroRelacion())->ultimoID();
        $miId = $miId[0]['XD'];
        */ /*
        $datos = [
            "idtblLibro"=> $_POST['idtblLibro'],
            "nombreLibro"=>$_POST['nombreLibro'],
            "estado"=>$_POST['estado']
            //nombre del campo de la base=> nombre o id del input
        ]; 

        $libro = new ModeloLibroRelacion(); // nuevo objeto libro
        $respuesta = $libro->insertarLibro($datos); //manda los datos al modelo

        
        if($respuesta > 0){ 
            return redirect()->to(base_url().'/librorelacion')->with('mensaje','1');
        }else {
            return redirect()->to(base_url().'/librorelacion')->with('mensaje','0');
        }
    } */

    public function crearAutorRelacion(){
        $datosaut = [
            "tblAutor_idtblAutor"=>$_POST['IDAutor'],
            "tblLibro_idtblLibro"=>$_POST['idtblLibro']
        ];

        $autor = new ModeloLibroRelacion();
        $respuesta = $autor->insertarAutor($datosaut);

        if($respuesta > 0){ 
            return redirect()->to(base_url().'/librorelacion')->with('mensaje','1');
        }else {
            return redirect()->to(base_url().'/librorelacion')->with('mensaje','0');
        }
        
    }

    public function crearTagRelacion(){
        $datostag = [
            "tblTag_idtblTag"=>$_POST['IDTag'],
            "tblLibro_idtblLibro"=>$_POST['idtblLibro']

        ];

        
        $tag = new ModeloLibroRelacion();
        $tag->insertarTag($datostag);
    }
    public function crearFiltroRelacion(){
        $datosfil = [
            "idfiltroFinal_Union"=>$_POST['IDFiltro'],
            "idtblLibro_Union"=>$_POST['idtblLibro']
        ];

        $filtro = new ModeloLibroRelacion();
        $filtro->insertarFiltro($datosfil);
        

        
    }
    
}