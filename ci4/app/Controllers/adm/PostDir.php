<?php

namespace App\Controllers\adm;

use App\Models\ModeloADM\ModeloDirectorio;
use App\Controllers\BaseController;



class postDir extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            $ciudad = $this->request->getVar('ciudad');
            $gestion = $this->request->getvar('gestion');
            $facultad = $this->request->getVar('facultad');
            $carrera = $this->request->getVar('carrera');
            $semestre = $this->request->getVar('semestre');
            $materia = $this->request->getVar('materia');

            $rules = [
                'ciudad' => 'required|numeric|is_natural_no_zero',
                'gestion' => 'required|numeric|is_natural_no_zero',
                'facultad' => 'required|numeric|is_natural_no_zero',
                'carrera' => 'required|numeric|is_natural_no_zero',
                'semestre' => 'required|numeric|is_natural_no_zero',
                'materia' => 'required|numeric|is_natural_no_zero'
            ];

            $session = session(); //Instanciar session
            if (!$this->validate($rules)) {
                
                $session->setFlashData('validation', 'Debes seleccionar una de cada opción');
                //echo implode(array_column($data, 'validation'));
            } else {
            
                $modelo = new ModeloDirectorio();                
                $probarID = $modelo->idDirectorioEs($gestion, $carrera, $facultad, $semestre, $materia, $ciudad);
                if (!empty($probarID)) {
                    $session->setFlashData('validation', 'Ya existe esa combinación de directorio');
                }
                else
                {
                    $nuevoDirectorio = [
                        'idtblCiudad_Union' => $ciudad,
                        'idtblGestion_Union' => $gestion,
                        'idtblFacultad_Union' => $facultad,
                        'idtblCarrera_Union' => $carrera,
                        'idtblSemestre_Union' => $semestre,
                        'idtblMateria_Union' => $materia,
                        'estado' => 1
                    ];
                    $modelo->save($nuevoDirectorio);
                    $session->setFlashdata('exitoso', 'Registro exitoso');
                    return redirect()->to('/adm-dir');
                }
                
            }
            return redirect()->to('/adm-dir');
        }
    }
}
