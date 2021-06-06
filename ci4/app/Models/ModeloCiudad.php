<?php
namespace App\Models;
use CodeIgniter\Model;
class ModeloCiudad extends Model
{
    public function listarCiudades()
    {
        $Ciudades = $this->db->query("SELECT * FROM `MIS_CIUDADES` WHERE `ESTADO` = 1");
        return $Ciudades->getResultArray();
    }
    public function listarCiudadesBaja()
    {
        $Ciudades = $this->db->query("SELECT * FROM `MIS_CIUDADES` WHERE `ESTADO` = 0");
        return $Ciudades->getResultArray();
    }
    protected $table = "tblCiudad";
    protected $primaryKey = 'idtblCiudad';
    protected $allowedFields = ['idtblCiudad','nombreCiudad', 'estado'];
}