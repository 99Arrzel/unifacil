<?php

namespace App\Controllers;

use App\Models\ModeloExamenRelacion;

class ExamenRelacion extends BaseController 
{
    public function index()
    {
        
        $examen= new ModeloExamenRelacion();
        $datosexamen = $examen->listarExamenes();
        $mensaje = session('mensaje');

        $tag =  new ModeloExamenRelacion();
        $datostag = $tag->listarTags();

        $filtro = new ModeloExamenRelacion();
        $datosfiltro = $filtro->listarFiltros();

        $data = [
            "examen" => $datosexamen,//datosdir
            "mensaje"=>$mensaje,
            "tag" => $datostag,
            "filtro" =>$datosfiltro
            //mensaje para la alerta
        ];
        echo view('templates/header');//navbar
        return view('abm_examen_relacion',$data);

    }

    public function crearTagRelacion(){
        $datostag = [
            "tblTag_idtblTag"=>$_POST['IDTag'],
            "tblExamen_idtblExamen"=>$_POST['idtblExamen']

        ];        
        $tag = new ModeloExamenRelacion();
        $respuesta =$tag->insertarTag($datostag);

        if($respuesta > 0){ 
            return redirect()->to(base_url().'/examenrelacion')->with('mensaje','1');
        }else {
            return redirect()->to(base_url().'/examenrelacion')->with('mensaje','0');
        }

    }
    public function crearFiltroRelacion(){
        $datosfil = [
            "idtblfiltroFinal_Union"=>$_POST['IDFiltro'],
            "idtblExamen_Union"=>$_POST['idtblExamen']
        ];

        $filtro = new ModeloExamenRelacion();
        $respuesta = $filtro->insertarFiltro($datosfil);
        
        if($respuesta > 0){ 
            return redirect()->to(base_url().'/examenrelacion')->with('mensaje','1');
        }else {
            return redirect()->to(base_url().'/examenrelacion')->with('mensaje','0');
        }
        
    }
    
}