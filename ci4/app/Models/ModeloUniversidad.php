<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeloUniversidad extends Model
{
    protected $table = 'tblUniversidad';
    protected $primaryKey = 'idtblUniversidad';
    protected $allowedFields = ['nombreUniversidad','tblCiudad_idtblCiudad'];

    public function idUniversidad(string $ciudad)//Oye maricon, y si usas un modelo truchazango para esto? XD 
    {                               //me gustan mas las querys
        $query = $this->db->query("SELECT ciu.idtblCiudad FROM tblCiudad as ciu WHERE ciu.nombreCiudad = '".$ciudad."' LIMIT 1");
        return $query->getRowArray();
    }
}
