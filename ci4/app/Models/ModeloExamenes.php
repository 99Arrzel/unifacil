<?php 
//it begings here
namespace App\Models;

use CodeIgniter\Model;

class ModeloExamenes extends Model 
{
    public function getExamenes()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT e.nombreExamen,e.year,e.paralelo,e.dirDoc,a.nombreAutor,i.dirImagen
        FROM tblExamen as e,tblImagen as i, tblAutor as a
        WHERE a.idtblAutor=tblAutor_idtblAutor AND i.idtblImagen=tblImagen_idtblImagen');
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