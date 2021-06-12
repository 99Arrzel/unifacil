<?php 
//it begings here
namespace App\Models;

use CodeIgniter\Model;

class ModeloLibros extends Model 
{
    public function getLibros()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM LIBROS_AUTORES_TAGS');
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

    public function listarUsuariosLibros()
    {                               
        $Libros = $this->db->query("SELECT * FROM REPORTE_USUARIO_LIBRO");
        return $Libros->getResultArray();          
    }

    


}







?>