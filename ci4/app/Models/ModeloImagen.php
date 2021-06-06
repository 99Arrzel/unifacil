<?php
 namespace App\Models;
use CodeIgniter\Model;

class ModeloImagen extends Model
{
    public function listarImagenes()
    {                               
        $Imagenes = $this->db->query("SELECT * FROM tblImagen");
        return $Imagenes->getResult();
    }

    protected $table = 'tblImagen';
    protected $primaryKey = 'idtblImagen';
    protected $allowedFields = ['nombreImagen','dirImagen','estado'];    
    
    public function insertarImagen($datos)
    {
        $Imagenes = $this->db->table('tblImagen');//selecciona la tabla
        $Imagenes->insert($datos); //inserta los datos

        return $this->db->insertID();//devuelve el ultimo ID
    }

    public function actualizarImagen($data,$idtblImagen)
    {
        $Imagenes = $this->db->table('tblImagen');
        $Imagenes->set($data);//funcion update
        $Imagenes->where('idtblImagen',$idtblImagen);
        return $Imagenes->update();
    }

    public function obtenerNombreImagen($data)
    {
        $Imagenes = $this->db->table('tblImagen');
        $Imagenes->where($data);
        return $Imagenes->get()->getResultArray(); //array de arrays :v
    }


    public function eliminarImagen($data)
    {
        $Imagenes = $this->db->table('tblImagen');
        $Imagenes->where($data);
        return $Imagenes->delete();
    }

}