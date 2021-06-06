<?php

namespace App\Controllers;

use App\Models\ModeloCiudad;

class Ciudad extends BaseController 
{
    public function index()
    {
        //AFCZ 
        /*
        if ($this->request->getMethod() == 'post') {
            function formatearString($str)
            {
                $str = trim($str); //Trim primero, esto hace trim primero y al final nomás
                //$str = str_replace(' ', '', $str); Comento esto porque no quiero que reemplace espacios dentro del string, ejemplo: La Paz
                return $str;
            }
            $fCiudad = formatearString($this->request->getVar('nombreCiudad'));
            $rules = [
                'nombreCiudad' => 'required|min_length[3]|max_length[20]',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;                
            }
            else
            {
                $model = new ModeloCiudad();
                $nuevaCiudad = [
                    'nombreCiudad' => $fCiudad,
                ];

                $model->save($nuevaCiudad);
                $session = session();
                $session->setFlashdata('exitoso', 'Registro exitoso');   
                return redirect()->to('/ciudad');//Return a ciudad, lo actualiza
            }
        }
            */
        //No toques arriba Daniel, es para crear


        echo view('templates/header');//navbar
        $ciudad = new ModeloCiudad();
        $datos = $ciudad->listarCiudades();
        $mensaje = session('mensaje');
        $data = [
            "datos" => $datos,//datos
            "mensaje"=>$mensaje//mensaje para la alerta
        ];
        echo view('abm_ciudad',$data);
        return view('templates/footer');   
        
        
    }

    public function crear()
    {
        //print_r($_POST); se fija si los datos llegan
        $datos = [
            "nombreCiudad"=>$_POST['nombreCiudad']//nombre del campo de la base=> nombre o id del input
        ];
        $ciudad = new ModeloCiudad(); // nuevo objeto ciudad
        $respuesta = $ciudad->insertar($datos); //manda los datos al modelo
        if($respuesta > 0){ 
            return redirect()->to(base_url().'/ciudad')->with('mensaje','1');
        }else {
            return redirect()->to(base_url().'/ciudad')->with('mensaje','0');
        }
    }
    public function actualizar()
    {
        //print_r($_POST); se fija si los datos llegan
        $datos = [
            "idtblCiudad"=>$_POST['idtblCiudad'],//el update es lo mismo que el insert pero hay que adjuntar el ID a modificar
            "nombreCiudad"=>$_POST['nombreCiudad']//nombre del campo de la base=> nombre o id del input
        ];
        $idtblCiudad=$_POST['idtblCiudad'];//id para la consulta
        $ciudad = new ModeloCiudad(); // nuevo objeto ciudad

        $respuesta = $ciudad->actualizar($datos,$idtblCiudad);

        if($respuesta){//if true
            return redirect()->to(base_url().'/ciudad')->with('mensaje','2');
        }else {
            return redirect()->to(base_url().'/ciudad')->with('mensaje','3');
        }
    }

    public function obtenerNombre($idtblCiudad)
    {
        echo view('templates/header');//navbar
        $data =["idtblCiudad" => $idtblCiudad];//mismo que en la linea 61
        $ciudad = new ModeloCiudad();
        $respuesta=$ciudad->obtenerNombre($data);

        $datos=[
            "datos" => $respuesta
        ];

        return view('actualizar',$datos);
    }

    public function eliminar($idtblCiudad)
    {
        $ciudad = new ModeloCiudad();
        $data = ["idtblCiudad" => $idtblCiudad];

        $respuesta = $ciudad->eliminar($data);

        if($respuesta){//if true
            return redirect()->to(base_url().'/ciudad')->with('mensaje','4');
        }else {
            return redirect()->to(base_url().'/ciudad')->with('mensaje','5');
        }
    }
}
