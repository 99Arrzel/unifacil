<?php
namespace App\Models\ModeloADM;
use CodeIgniter\Model;
class ModeloFiltroCiudadFacultad extends Model
{
    protected $primaryKey = 'idtblfiltroCiudadFacultad';
    protected $allowedFields = ['idtblfiltroCiudadFacultad','idtblCiudad_Union','idtblFacultad_Union','estado'];
}
?>