<?php
namespace App\Models\ModeloADM;
use CodeIgniter\Model;
class ModeloDirectorio extends Model
{
    //Abajo puras consultas SELECT
    public function ListarDirectorio()
    {
        $query = $this->db->query('SELECT * FROM `DIRECTORIO` WHERE ESTADO = 1');
        return $query->getResultArray();
    }
    public function ListarDirectorioHidden()
    {
        $query = $this->db->query('SELECT * FROM `DIRECTORIO` WHERE ESTADO = 0');
        return $query->getResultArray();
    }
    protected $table = 'filtroFinal';
    protected $primaryKey = 'idtblfiltroFinal';
    protected $allowedFields = ['idtblfiltroFinal','idtblMateria_Union','idtblSemestre_Union','estado'];
}