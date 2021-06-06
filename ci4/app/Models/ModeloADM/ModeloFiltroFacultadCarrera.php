<?php
namespace App\Models\ModeloADM;
use CodeIgniter\Model;
class ModeloFiltroFacultadCarrera extends Model
{
    protected $primaryKey = 'idtblfiltroFacultadCarrera';
    protected $allowedFields = ['idtblfiltroFacultadCarrera','idtblFacultad_Union','idtblCarrera_Union','estado'];
}
?>