<?php
namespace App\Models;
use CodeIgniter\Model;
class ModeloGestion extends Model
{
    public function listarGestiones()
    {
        $gestiones = $this->db->query("SELECT * FROM `MIS_GESTIONES` WHERE `ESTADO` = 1");
        return $gestiones->getResultArray();
    }
    public function listarGestionesBaja()
    {
        $gestiones = $this->db->query("SELECT * FROM `MIS_GESTIONES` WHERE `ESTADO` = 0");
        return $gestiones->getResultArray();
    }
    protected $table = "tblGestion";
    protected $primaryKey = 'idtblGestion';
    protected $allowedFields = ['idtblGestion','nombreGestion', 'estado'];
}