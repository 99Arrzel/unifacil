<?php

namespace App\Controllers;

use App\Models\ModeloTag;

class Tag extends BaseController 
{
    public function index()
    {
        echo view('templates/header');//navbar
        $tag = new ModeloTag();
        $datos = $tag->listarTags();
        $mensaje = session('mensaje');
        $data = [
            "datos" => $datos,//datos
            "mensaje"=>$mensaje//mensaje para la alerta
        ];
        return view('abm_tag',$data);
        
        
    }

    public function crearTag()
    {
        //print_r($_POST); se fija si los datos llegan
        $datos = [
            "nombreTag"=>$_POST['nombreTag'],
            "estado"=>$_POST['estado']//nombre del campo de la base=> nombre o id del input
        ];
        $tag = new ModeloTag(); // nuevo objeto tag
        $respuesta = $tag->insertarTag($datos); //manda los datos al modelo
        if($respuesta > 0){ 
            return redirect()->to(base_url().'/tag')->with('mensaje','1');
        }else {
            return redirect()->to(base_url().'/tag')->with('mensaje','0');
        }
    }
    public function actualizarTag()
    {
        //print_r($_POST); se fija si los datos llegan
        $datos = [
            "idtblTag"=>$_POST['idtblTag'],//el update es lo mismo que el insert pero hay que adjuntar el ID a modificar
            "nombreTag"=>$_POST['nombreTag'],
            "estado"=>$_POST['estado']//nombre del campo de la base=> nombre o id del input
        ];
        $idtblTag=$_POST['idtblTag'];//id para la consulta
        $tag = new ModeloTag(); // nuevo objeto tag

        $respuesta = $tag->actualizarTag($datos,$idtblTag);

        if($respuesta){//if true
            return redirect()->to(base_url().'/tag')->with('mensaje','2');
        }else {
            return redirect()->to(base_url().'/tag')->with('mensaje','3');
        }
    }

    public function obtenernombreTag($idtblTag)
    {
        echo view('templates/header');//navbar
        $data =["idtblTag" => $idtblTag];//mismo que en la linea 61
        $tag = new ModeloTag();
        $respuesta=$tag->obtenernombreTag($data);

        $datos=[
            "datos" => $respuesta
        ];

        return view('actualizarTag',$datos);
    }

    public function eliminarTag($idtblTag)
    {
        $tag = new ModeloTag();
        $data = ["idtblTag" => $idtblTag];

        $respuesta = $tag->eliminarTag($data);

        if($respuesta){//if true
            return redirect()->to(base_url().'/tag')->with('mensaje','4');
        }else {
            return redirect()->to(base_url().'/tag')->with('mensaje','5');
        }
    }
}
