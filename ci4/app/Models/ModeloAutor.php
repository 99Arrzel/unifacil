<?php
namespace App\Models;
use CodeIgniter\Model;

class ModeloAutor extends Model
{
    public function listarAutores()
    {                               
        $Autores = $this->db->query("SELECT * FROM tblAutor");
        return $Autores->getResult();
    }

    protected $table = 'tblAutor';
    protected $primaryKey = 'idtblAutor';
    protected $allowedFields = ['nombreAutor','estado'];    
    
    public function insertarAutor($datos)
    {
        $Autores = $this->db->table('tblAutor');//selecciona la tabla
        $Autores->insert($datos); //inserta los datos

        return $this->db->insertID();//devuelve el ultimo ID
    }

    public function actualizarAutor($data,$idtblAutor)
    {
        $Autores = $this->db->table('tblAutor');
        $Autores->set($data);//funcion update
        $Autores->where('idtblAutor',$idtblAutor);
        return $Autores->update();
    }

    public function obtenerNombreAutor($data)
    {
        $Autores = $this->db->table('tblAutor');
        $Autores->where($data);
        return $Autores->get()->getResultArray(); //array de arrays :v
    }


    public function eliminarAutor($data)
    {
        $Autores = $this->db->table('tblAutor');
        $Autores->where($data);
        return $Autores->delete();
    }

}