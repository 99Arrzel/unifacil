<?php namespace App\Models;

use CodeIgniter\Model;

class ModeloUsuario extends Model{
    
    protected $table = 'tblUsuario';
    protected $primaryKey = 'idtblUsuario';
    protected $allowedFields = ['idtblUsuario','nombreUsuario', 'apellido', 'login', 'email', 'password', 'confirma_password', 'estado', 'tblNivel_idtblNivel', 'suscrito']; //Campos manipulados
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data){ //Opciones antes de insertar
        $data = $this->passwordHash($data); //Determinar de donde viene data.
        return $data;
    }
    protected function beforeUpdate(array $data){//Opcion antes de update, lo ejecuta Codeigniter con el nombre reservado "beforeUpdate"
        $data = $this->passwordHash($data);
        return $data;
    }
    protected function passwordHash(array $data){
        if (isset($data['data']['password']))
        {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT); //Encriptrucho
        }        
        return $data;
    }
}
