<?php

namespace App\Models\ModeloADM;

use CodeIgniter\Model;

class ModeloUsuarioADM extends Model
{
    public function traerUsuariosActivos()
    {
        $query = $this->db->query("SELECT * FROM `MIS_USUARIOS` WHERE ESTADO = 1");
        return $query->getResultArray();
    }
    public function traerUsuariosInactivos()
    {
        $query = $this->db->query("SELECT * FROM `MIS_USUARIOS` WHERE ESTADO = 0");
        return $query->getResultArray();
    }
    public function traerNiveles()
    {
        $query = $this->db->query("SELECT * FROM `NIVELES`");
        return $query->getResultArray();
    }
}
?>