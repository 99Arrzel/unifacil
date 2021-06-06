<?php
namespace App\Models;
use CodeIgniter\Model;
class ModeloMateria extends Model
{
    public function listarMaterias()
    {
        $Materias = $this->db->query("SELECT * FROM `MIS_MATERIAS` WHERE `ESTADO` = 1");
        return $Materias->getResultArray();
    }
    public function listarMateriasBaja()
    {
        $Materias = $this->db->query("SELECT * FROM `MIS_MATERIAS` WHERE `ESTADO` = 0");
        return $Materias->getResultArray();
    }
    protected $table = "tblMateria";
    protected $primaryKey = 'idtblMateria';
    protected $allowedFields = ['idtblMateria','nombreMateria', 'estado'];
}