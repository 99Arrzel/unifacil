<?php 
//it begings here
namespace App\Models;

use CodeIgniter\Model;

class ModeloReporteUsuario extends Model 
{

    public function listarUsuariosActivos()
    {                               
        $Usuarios = $this->db->query("SELECT * FROM USUARIOS_ACTIVOS");
        return $Usuarios->getResultArray();          
    }

}







?>