<?php

namespace App\Controllers;

use App\Models\ModeloUsuario;

class Usuarios extends BaseController
{
    public function registrar()
    {
        helper(['form']);
        //Limpiar espacios en blanco
        
        function formatearString($str)
        {
            $str = trim($str); //Trim primero
            $str = str_replace(' ', '', $str);
            return $str;
        }

        $fusuario = formatearString($this->request->getVar('nombreUsuario'));
        $fapellido = formatearString($this->request->getVar('apellido'));
        $femail = formatearString($this->request->getVar('email'));
        $flogin = formatearString($this->request->getVar('login'));
        $fpassword = formatearString($this->request->getVar('password'));

        $data = [];
        
        if ($this->request->getMethod() == 'post') {
            //usuario y password

            $rules = [
                'nombreUsuario' => 'required|min_length[3]|max_length[20]|sinEspacio',
                'apellido' => 'required|min_length[3]|max_length[20]|sinEspacio',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tblUsuario.email]',
                'login' => 'trim|required|min_length[6]|max_length[50]|is_unique[tblUsuario.login]|sinEspacio',
                'password' => 'required|min_length[8]|max_length[255]|sinEspacio',
                'confirma_password' => 'matches[password]',
            ];
            $errors = [
                'nombreUsuario' => ['sinEspacio' => 'Tu usuario no puede tener espacios.'],
                'apellido' => ['sinEspacio' => 'Tu apellido no puede tener espacios.'],
                'login' => ['sinEspacio' => 'Tu login no puede tener espacios.'],
                'password' => ['sinEspacio' => 'Tu password no puede tener espacios.'],
            ];
            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else { //Creacion de usuario si todo está validado
                $model = new ModeloUsuario();
                $nuevoUsuario = [
                    'nombreUsuario' => $fusuario,
                    'apellido' => $fapellido,
                    'email' => $femail,
                    'login' => $flogin, //Login usuario
                    'password' => $fpassword, //Pass
                    'tblNivel_idtblNivel' => 3, //Nivel default (usuario)
                    'estado' => 1, //Estado activo = 1
                ];

                $model->save($nuevoUsuario);
                $session = session();
                $session->setFlashdata('exitoso', 'Registro exitoso');
                return redirect()->to('/login');//Return a main
            }
        }
        echo view('templates/header', $data);
        echo view('registrar');
        echo view('templates/footer');
    }

    public function login()
    {
        $data = [];
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            //Nombre, apellido, usuario, correo, password, confirma_password//Falta poner el nivel y el estado
            $rules = [
                'login' => 'required|min_length[6]|validateState[login]',
                'password' => 'required|validateUser[login,password]'
            ];
            $errors = ['login' => ['validateState' => 'Este usuario a sido dado de baja.'], //Activo
                'password' => ['validateUser' => 'Correo o contraseña no validos.'], //Es correcto?
            ];
            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new ModeloUsuario();
                $usuario = $model->where('login', $this->request->getVar('login'))
                    ->first();
                $this->setUserSession($usuario);
                
                
                return redirect()->to('/perfil');
            }
        }
        echo view('templates/header', $data);
        echo view('login');
        echo view('templates/footer');
    }

    public function perfil()
    {
        $data = [];
        helper(['form']);
        $model = new ModeloUsuario();
        if ($this->request->getMethod() == 'post') {
            //usuario y password
            $rules = [
                'nombreUsuario' => 'required|min_length[3]|max_length[20]|sinEspacio',
                'apellido' => 'required|min_length[3]|max_length[20]|sinEspacio',
                'seguro' => 'required|confirmarPassword[seguro]'
                
            ];

            if ($this->request->getPost('password') != '') { //Si la password no está vacia.
                $rules['password'] = 'required|min_length[8]|max_length[255]|sinEspacio';
                $rules['confirma_password'] = 'matches[password]|sinEspacio';
            }
            //----------------->
            $esteUsuario = $model->where('idtblUsuario', session()->get('idtblUsuario'))->first();//Agarro los datos del id de este usuario
            if ($esteUsuario['login'] == $this->request->getVar('login')) {
                $rules['login'] = 'required|min_length[6]|max_length[50]|sinEspacio';
            } else {
                $rules['login'] = 'required|min_length[6]|max_length[50]|is_unique[tblUsuario.login]|sinEspacio';
            }
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $nuevoUsuario = [
                    'idtblUsuario' => session()->get('idtblUsuario'),
                    'nombreUsuario' => $this->request->getVar('nombreUsuario'),
                    'apellido' => $this->request->getVar('apellido'),
                    'login' => $this->request->getVar('login'),
                ];
                if ($this->request->getPost('password') != '') {
                    $nuevoUsuario['password'] = $this->request->getPost('password');
                }
                $model->save($nuevoUsuario);
                session()->setFlashdata('exitoso', 'Actualización exitosa.');
                
                return redirect()->to('/perfil');//Return a main
            }
        }
        $data['usuario'] = $model->where('idtblUsuario', session()->get('idtblUsuario'))->first(); //Actualiza la session del usuario.

        echo view('templates/header', $data);
        echo view('perfil');
        echo view('templates/footer');
    }

    public function contacto()
    {
        define('SITE_KEYV3', '6Lf6nMkaAAAAAHCrzF-w3c3kdPm_7G60sBbZDv-n');
        define('SECRET_KEYV3', '6Lf6nMkaAAAAABybIyWrYLOgUHyEmhg9WIskyl6C');
        define('SITE_KEYV2', '6LcHt8kaAAAAAM-ez5gn_ZucmvRZtKEjf1MduTRv');
        define('SECRET_KEYV2', '6LcHt8kaAAAAAFOCuiJnfsIXc1VSIucWncU4kJaK');
        $data = [];
        helper(['form']);
        echo view('templates/header', $data);
        echo view('contacto');
        echo view('templates/footer');
    }

    public function gatopiola()
    {
        echo view('gatoPiola');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    private function setUserSession($usuario)
    {
        $data = [
            'idtblUsuario' => $usuario['idtblUsuario'],
            'nombreUsuario' => $usuario['nombreUsuario'],
            'apellido' => $usuario['apellido'],
            'login' => $usuario['login'],
            'email' => $usuario['email'],
            'nivel' => $usuario['tblNivel_idtblNivel'],
            'isLoggedIn' => true,
            
        ];
        session()->set($data);
        return true;
    }
    
}
