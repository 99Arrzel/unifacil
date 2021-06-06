<?php

namespace App\Controllers;

use App\Models\ModeloVistas;

class Vistas extends BaseController
{
    public function index()//Mostrar universidades.
    {
        $data = [];
        helper(['form']);
        echo view('templates/header', $data);
        $items = (new ModeloVistas())->agarrarCiudades();
        $miArray = array_column($items, 'CIUDAD'); //
        $data = [
            "ciudad"=> $miArray
        ];
        echo view('/vistas/ciudad',$data);
        return view('templates/footer');
    }

    public function unis(string $s1)
    {
        $s1 = urldecode($s1);
        $data = [];
        helper(['form']);
        echo view('templates/header', $data);
        $items = (new ModeloVistas())->agarrarGestionPorCiudad($s1);
        $miArray = array_column($items, 'GESTION');
        $data = [
            "gestion"=> $miArray
        ];
        echo view('/vistas/gestion',$data);
        return view('templates/footer');
    }

    public function facultades(string $s1, string $s2)
    {
        
        $s1 = urldecode($s1);
        $s2 = urldecode($s2);
        $data = [];
        helper(['form']);
        echo view('templates/header', $data);
        $resultado = new ModeloVistas();
        $items = $resultado->agarrarFacultadPorCiudad($s1, $s2);
        $miArray = array_column($items, 'FACULTAD');
        $data = [
            "facultad"=> $miArray
        ];
        echo view('/vistas/facultad',$data);
        return view('templates/footer');
    }

    public function carreras(string $s1, string $s2, string $s3)
    {
        
        $s1 = urldecode($s1);
        $s2 = urldecode($s2);
        $s3 = urldecode($s3);
        $data = [];
        helper(['form']);
        echo view('templates/header', $data);
        $resultado = new ModeloVistas();
        $items = $resultado->agarrarCarrerasPorCiudad($s1, $s2, $s3);
        $miArray = array_column($items, 'CARRERA');
        $data = [
            "carrera"=> $miArray
        ];
        echo view('/vistas/carrera',$data);
        return view('templates/footer');
    }

    public function semestres(string $s1, string $s2, string $s3, string $s4)
    {
        $s1 = urldecode($s1);
        $s2 = urldecode($s2);
        $s3 = urldecode($s3);
        $s4 = urldecode($s4);
        $data = [];
        helper(['form']);
        echo view('templates/header', $data);
        $resultado = new ModeloVistas();
        $items = $resultado->agarrarSemestrePorCarrera($s1, $s2, $s3, $s4);
        $miArray = array_column($items, 'SEMESTRE');
        $data = [
            "semestre"=> $miArray
        ];
        echo view('/vistas/semestre',$data);
        return view('templates/footer');
    }
    public function materias(string $s1, string $s2, string $s3, string $s4, string $s5)
    {
        $s1 = urldecode($s1);
        $s2 = urldecode($s2);
        $s3 = urldecode($s3);
        $s4 = urldecode($s4);
        $s5 = urldecode($s5);
        $data = [];
        helper(['form']);
        echo view('templates/header', $data);
        $resultado = new ModeloVistas();
        $items = $resultado->agarrarMateriasPorSemestre($s1, $s2, $s3, $s4, $s5);
        $miArray = array_column($items, 'MATERIA');
        $data = [
            "materia"=> $miArray
        ];
        echo view('/vistas/materia',$data);
        return view('templates/footer');
    }
    public function miEspacio(string $ciudad, string $gestion, string $facultad, string $carrera, string $semestre, string $materia)
    {
        $ciudad = urldecode($ciudad);
        $gestion = urldecode($gestion);
        $facultad = urldecode($facultad);
        $carrera = urldecode($carrera);
        $semestre = urldecode($semestre);
        $materia = urldecode($materia);
        $data = [];
        helper(['form']);
        echo view('templates/header', $data);
        $resultado = new ModeloVistas();
        $items = $resultado->agarrarLibrosDirectorio($ciudad, $gestion, $facultad, $carrera, $semestre, $materia);
        $itemsExa = $resultado->agarrarExamenesDirectorio($ciudad, $gestion, $facultad, $carrera, $semestre, $materia);
        $data = [
            "vistaLibros" => $items,
            "vistaExamenes" => $itemsExa
            //"mensaje"=>$mensaje//mensaje para la alerta
        ];
        echo view('vistas/contenido',$data);
        return view('templates/footer');
    }
}
