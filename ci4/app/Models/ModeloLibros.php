<?php 
//it begings here
namespace App\Models;

use CodeIgniter\Model;

class ModeloLibros extends Model 
{
    public function getLibros()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT l.nombreLibro,l.year,l.edicion,l.dirDoc,i.dirImagen
        FROM tblLibro as l, tblImagen as i
        WHERE l.tblImagen_idtblImagen = i.idtblImagen ');
        $result = $query->getResult();
        if(count($result)>0)
        {
            return $result;
        }
        else 
        {
            return false;
        }
    }

}







?>