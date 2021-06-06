<?php
namespace App\Models;
use CodeIgniter\Model;
class ModeloSemestre extends Model
{
    public function listarSemestres()
    {
        $semestres = $this->db->query("SELECT * FROM `MIS_SEMESTRES` WHERE `ESTADO` = 1");
        return $semestres->getResultArray();
    }
    public function listarSemestresBaja()
    {
        $semestres = $this->db->query("SELECT * FROM `MIS_SEMESTRES` WHERE `ESTADO` = 0");
        return $semestres->getResultArray();
    }
    protected $table = "tblSemestre";
    protected $primaryKey = 'idtblSemestre';
    protected $allowedFields = ['idtblSemestre','nombreSemestre', 'estado'];
}