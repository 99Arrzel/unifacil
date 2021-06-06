<?php

namespace App\Validation;

use App\Models\ModeloUsuario;
use App\Models\ModeloADM\ModeloDirectorio;

class UserRules
{
    public function validateUser(string $str, string $fields, array $data) //Verificar Usuario
    {
        $model = new ModeloUsuario(); //Instancia de clase modelousuario
        $usuario = $model->where('login', $data['login'])
                ->first();
        if (!$usuario) {
            return false;
        }
        if ($usuario['login'] != $data['login']) { //Tienen que ser iguales según la ingeniera zzzzz 
            return false;
        }
        return password_verify($data['password'], $usuario['password']);
    }

    public function validateState(string $str, string $fields, array $data)
    {
        $modelo = new ModeloUsuario();
        $usuario = $modelo->where('login', $data['login'])
            ->first();
        if (!$usuario) {//verdad si no existe, asi no jode al validateUser
            return true;
        } else {
            if ($usuario['estado'] == 0) {//estado
                return false;
            } else {
                return true;
            }
        }
    }
    public function sinEspacio($str)
    {
        $trimeado = trim($str);
        if ($trimeado == $str) {
            $reemplazado = str_replace(' ', '', $str);
            {
                if ($reemplazado == $str) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }
    public function confirmarPassword(string $str, string $fields, array $data)
    {
        $modelo = new ModeloUsuario();
        $usuario = $modelo->where('login', $data['login'])
            ->first();
        if (password_verify($data['seguro'], $usuario['password'])) {
            return true;
        }
        return false;
    }
    
}
