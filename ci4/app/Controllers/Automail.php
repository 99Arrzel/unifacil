<?php 
namespace App\Controllers;

use App\Models\ModeloMail;

class Automail extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        $mensaje = session('mensaje');
        $data = [
            "mensaje"=>$mensaje//mensaje para la alerta
        ];
        return view('add_mail',$data);  
        
    }


    public function crearMail()
    {
        $datos = [
            "dirMail"=>$_POST['dirMail']
        ];
        $email = new ModeloMail(); 
        $respuesta = $email->insertarMail($datos); 
        if($respuesta > 0){ 
            return redirect()->to(base_url().'/automail')->with('mensaje','1');
        }else {
            return redirect()->to(base_url().'/automail')->with('mensaje','0');
        }

    }
    
    /*
    public function send()
    {
        $msg = "Mensaje de prueba";
        //al parecer enviar emails era mucho mas facil XD

        $email='rats4final@gmail.com';

        if (mail("rats4final@gmail.com","Nuevo Libro añadido",$msg)) {
            echo 'enviado correctamente';
        }
    }
    */

    
}