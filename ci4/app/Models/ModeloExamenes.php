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

    public function listarUsuariosExamenes()
    {                               
        $Examenes = $this->db->query("SELECT * FROM REPORTE_USUARIO_EXAMEN");
        return $Examenes->getResultArray();          
    }

    public function insertarUsuarioExamen($datosusex)
    {
        $Examenes = $this->db->table('tblUsuario_downloads_tblExamen');//selecciona la tabla
        $Examenes->insert($datosusex); //inserta los datos
        //return $this->db->insertID();//devuelve el ultimo ID
    }
}







?>