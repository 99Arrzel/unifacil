<?php
namespace App\Models\ModeloADM;
use CodeIgniter\Model;
class ModeloFiltroFinal extends Model
{
    protected $primaryKey = 'idfiltroFinal';
    protected $allowedFields = ['idtblMateria_Union','idtblSemestre_Union','estado'];
}
?>