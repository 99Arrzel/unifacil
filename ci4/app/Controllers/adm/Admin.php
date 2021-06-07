<?php
namespace App\Controllers\adm;
use App\Models\ModeloADM\ModeloDirectorio;
use App\Models\ModeloADM\ModeloUsuarioADM;
use App\Models\ModeloUsuario;
use App\Controllers\BaseController;
class admin extends BaseController {
    public function usuarios() {
        helper( ['form'] );
        $data = [];
        //Limpiar espacios en blanco
        function formatearString( $str ) {
            $str = trim( $str );
            //Trim primero
            $str = str_replace( ' ', '', $str );
            return $str;
        }
        $nombre = formatearString( $this->request->getVar( 'nombre' ) );
        $login = formatearString( $this->request->getVar( 'login' ) );
        $apellido = formatearString( $this->request->getVar( 'apellido' ) );
        $email = formatearString( $this->request->getVar( 'email' ) );
        $pass = formatearString( $this->request->getVar( 'epassword' ) );
        $sus = formatearString( $this->request->getVar( 'suscrito' ) );
        $nivel = formatearString( $this->request->getVar( 'nivel' ) );
        if ( $this->request->getMethod() == 'post' ) {
            //usuario y password
            $rules = [
                'nombre' => 'required|min_length[3]|max_length[20]|sinEspacio',
                'apellido' => 'required|min_length[3]|max_length[20]|sinEspacio',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tblUsuario.email]',
                'login' => 'trim|required|min_length[6]|max_length[50]|is_unique[tblUsuario.login]|sinEspacio',
                'epassword' => 'required|min_length[8]|max_length[255]|sinEspacio',
            ];
            $errors = [
                'nombre' => ['sinEspacio' => 'Tu usuario no puede tener espacios.'],
                'apellido' => ['sinEspacio' => 'Tu apellido no puede tener espacios.'],
                'login' => ['sinEspacio' => 'Tu login no puede tener espacios.'],
                'password' => ['sinEspacio' => 'Tu password no puede tener espacios.'],
            ];
            $session = session();
            if ( !$this->validate( $rules, $errors ) ) {
                $data['validation'] = $this->validator;
            } else {
                //Creacion de usuario si todo está validado*/
                $model = new ModeloUsuario();
                $nuevoUsuario = [
                    'nombreUsuario' => $nombre,
                    'apellido' => $apellido,
                    'email' => $email,
                    'login' => $login, //Login usuario
                    'password' => $pass, //Pass
                    'tblNivel_idtblNivel' => $nivel, //Nivel default ( usuario )
                    'suscrito' => $sus,
                    'estado' => 1, //Estado activo = 0
                ];
                $model->save( $nuevoUsuario );
                $session->setFlashdata( 'exitoso', 'Registro exitoso' );
                return redirect()->to( 'https://proyecto3.tk/ListarUsuarios' );
            }
        }
        $datosUsuario = ( new ModeloUsuarioADM() )->traerUsuariosActivos();
        $datosUsuarioBaja = ( new ModeloUsuarioADM() )->traerUsuariosInactivos();
        $datosNivel = ( new ModeloUsuarioADM() )->traerNiveles();
        $data = array_merge( $data, [
            'usuario' =>$datosUsuario,
            'nivel' =>$datosNivel,
            'usuarioBaja' =>$datosUsuarioBaja,
        ] );
        echo view( 'templates/header', $data );
        echo view( '/admin/usuarios' );
        return view( 'templates/footer' );
    }
    public function eliminarID() {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $model = new ModeloUsuario();
            $usuario = [
                'idtblUsuario' => $id,
                'estado' => 0,
            ];
            $model->save( $usuario );
            echo'{"baja":true}';
        }
    }
    public function restaurarID() {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $model = new ModeloUsuario();
            $usuario = [
                'idtblUsuario' => $id,
                'estado' => 1,
            ];
            $model->save( $usuario );
            echo'{"baja":true}';
        }
    }
    public function suscritoID() {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $estadoSub = $this->request->getPost( 'estadoSub' );
            $model = new ModeloUsuario();
            $usuario = [
                'idtblUsuario' => $id,
                'suscrito' => $estadoSub,
            ];
            $model->save( $usuario );
            echo'{"baja":true}';
        }
    }
    public function guardarUsuarios() {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $nombre = $this->request->getPost( 'nombre' );
            $apellido = $this->request->getPost( 'apellido' );
            $login = $this->request->getPost( 'login' );
            $email = $this->request->getPost( 'email' );
            $nivel = $this->request->getPost( 'nivel' );
            //TODO: verificiación de datos acá
            $model = new ModeloUsuario();
            $nuevoUsuario = [
                'idtblUsuario' => $id,
                'nombreUsuario' => $nombre,
                'apellido' => $apellido,
                'email' => $email,
                'login' => $login, //Login usuario
                'tblNivel_idtblNivel' => $nivel, //Nivel default ( usuario )
            ];
            $model->save( $nuevoUsuario );
            echo'{"exists":true}';
            //True si pasa
        }
    }
    public function crearUsuario() {
        helper( ['form'] );
        //Limpiar espacios en blanco
        function formatearString( $str ) {
            $str = trim( $str );
            //Trim primero
            $str = str_replace( ' ', '', $str );
            return $str;
        }
        $nombre = formatearString( $this->request->getVar( 'nombre' ) );
        $login = formatearString( $this->request->getVar( 'login' ) );
        $apellido = formatearString( $this->request->getVar( 'apellido' ) );
        $email = formatearString( $this->request->getVar( 'email' ) );
        $pass = formatearString( $this->request->getVar( 'password' ) );
        $sus = formatearString( $this->request->getVar( 'suscrito' ) );
        $nivel = formatearString( $this->request->getVar( 'nivel' ) );
        if ( $this->request->getMethod() == 'post' ) {
            {
                //usuario y password
                $rules = [
                    'nombre' => 'required|min_length[3]|max_length[20]|sinEspacio',
                    'apellido' => 'required|min_length[3]|max_length[20]|sinEspacio',
                    'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tblUsuario.email]',
                    'login' => 'trim|required|min_length[6]|max_length[50]|is_unique[tblUsuario.login]|sinEspacio',
                    'password' => 'required|min_length[8]|max_length[255]|sinEspacio',
                ];
                $errors = [
                    'nombre' => ['sinEspacio' => 'Tu usuario no puede tener espacios.'],
                    'apellido' => ['sinEspacio' => 'Tu apellido no puede tener espacios.'],
                    'login' => ['sinEspacio' => 'Tu login no puede tener espacios.'],
                    'password' => ['sinEspacio' => 'Tu password no puede tener espacios.'],
                ];
                $session = session();
                if ( !$this->validate( $rules, $errors ) ) {
                    $session->setFlashdata( 'error', 'Verifica los datos' );
                    $data['validation'] = $this->validator;
                } else {
                    //Creacion de usuario si todo está validado*/
                    $model = new ModeloUsuario();
                    $nuevoUsuario = [
                        'nombreUsuario' => $nombre,
                        'apellido' => $apellido,
                        'email' => $email,
                        'login' => $login, //Login usuario
                        'password' => $pass, //Pass
                        'tblNivel_idtblNivel' => $nivel, //Nivel default ( usuario )
                        'suscrito' => $sus,
                        'estado' => 1, //Estado activo = 0
                    ];
                    $model->save( $nuevoUsuario );
                    $session->setFlashdata( 'exitoso', 'Registro exitoso' );
                }
                return redirect()->to( '/ListarUsuarios' );
                //Return a main
            }
        }
    }
}
