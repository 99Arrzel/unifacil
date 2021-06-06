<?php
namespace App\Models;
use CodeIgniter\Model;

class ModeloTag extends Model
{
    public function listarTags()
    {                               
        $Tags = $this->db->query("SELECT * FROM tblTag");
        return $Tags->getResult();
    }

    protected $table = 'tblTag';
    protected $primaryKey = 'idtblTag';
    protected $allowedFields = ['nombreTag'];    
    
    public function insertarTag($datos)
    {
        $Tags = $this->db->table('tblTag');//selecciona la tabla
        $Tags->insert($datos); //inserta los datos

        return $this->db->insertID();//devuelve el ultimo ID
    }

    public function actualizarTag($data,$idtblTag)
    {
        $Tags = $this->db->table('tblTag');
        $Tags->set($data);//funcion update
        $Tags->where('idtblTag',$idtblTag);
        return $Tags->update();
    }

    public function obtenerNombreTag($data)
    {
        $Tags = $this->db->table('tblTag');
        $Tags->where($data);
        return $Tags->get()->getResultArray(); //array de arrays :v
    }


    public function eliminarTag($data)
    {
        $Tags = $this->db->table('tblTag');
        $Tags->where($data);
        return $Tags->delete();
    }

}