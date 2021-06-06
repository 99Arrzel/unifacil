<?php
namespace App\Models;
use CodeIgniter\Model;
class ModeloFacultad extends Model
{
    public function listarFacultades()
    {
        $facultades = $this->db->query("SELECT * FROM `MIS_FACULTADES` WHERE `ESTADO` = 1");
        return $facultades->getResultArray();
    }
    public function listarFacultadesBaja()
    {
        $facultades = $this->db->query("SELECT * FROM `MIS_FACULTADES` WHERE `ESTADO` = 0");
        return $facultades->getResultArray();
    }
    protected $table = "tblFacultad";
    protected $primaryKey = 'idtblFacultad';
    protected $allowedFields = ['idtblFacultad','nombreFacultad', 'estado'];
}