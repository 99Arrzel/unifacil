<?php
namespace App\Models;
use CodeIgniter\Model;
class ModeloCarrera extends Model
{
    public function listarCarreras()
    {
        $carreras = $this->db->query("SELECT * FROM `MIS_CARRERAS` WHERE `ESTADO` = 1");
        return $carreras->getResultArray();
    }
    public function listarCarrerasBaja()
    {
        $carreras = $this->db->query("SELECT * FROM `MIS_CARRERAS` WHERE `ESTADO` = 0");
        return $carreras->getResultArray();
    }
    protected $table = "tblCarrera";
    protected $primaryKey = 'idtblCarrera';
    protected $allowedFields = ['idtblCarrera','nombreCarrera', 'estado'];
}