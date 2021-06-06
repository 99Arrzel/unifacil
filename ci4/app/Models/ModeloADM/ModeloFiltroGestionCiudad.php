<?php
namespace App\Models\ModeloADM;
use CodeIgniter\Model;
class ModeloFiltroGestionCiudad extends Model
{
    protected $primaryKey = 'idtblfiltroGestionCIudad';
    protected $allowedFields = ['idtblfiltroGestionCIudad','idtblGestion_Union','idtblCiudad_Union','estado'];

}
?>