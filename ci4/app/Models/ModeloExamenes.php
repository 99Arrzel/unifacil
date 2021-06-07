<?php 
//it begings here
namespace App\Models;

use CodeIgniter\Model;

class ModeloExamenes extends Model 
{
    public function getExamenes()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM EXAMENES_AUTORES_TAGS');
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