<?php
namespace App\Models\ModeloADM;
use CodeIgniter\Model;
class ModeloFiltroCarreraSemestre extends Model
{
    protected $primaryKey = 'idtblfiltroCarreraSemestre';
    protected $allowedFields = ['idtblfiltroCarreraSemestre','idtblCarrera_Union','idtblSemestre_Union','estado'];
}
?>