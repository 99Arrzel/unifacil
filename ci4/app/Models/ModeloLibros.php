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

    public function insertarUsuarioLibro($datosuslib)
    {
        $Libros = $this->db->table('tblUsuario_downloads_tblLibro');//selecciona la tabla
        $Libros->insert($datosuslib); //inserta los datos
        //return $this->db->insertID();//devuelve el ultimo ID
    }   
    


}







?>