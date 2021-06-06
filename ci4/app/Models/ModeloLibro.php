<?php
namespace App\Models;
use CodeIgniter\Model;

class ModeloLibro extends Model
{
    public function listarLibros()
    {                               
        $Libros = $this->db->query("SELECT lib.idtblLibro , lib.nombreLibro, lib.year, lib.edicion, lib.dirDoc, lib.estado, lib.tblImagen_idtblImagen ,ima.idtblImagen,ima.nombreImagen 
        FROM tblImagen AS ima, tblLibro as lib
        WHERE lib.tblImagen_idtblImagen = ima.idtblImagen");
        return $Libros->getResult();        
    }

    protected $table = 'tblLibro';
    protected $primaryKey = 'idtblLibro';
    protected $allowedFields = ['idtblLibro','nombreLibro',
    'year','edicion','dirDor',
    'tblImagen_idtblImagen'];    
    
    public function insertarLibro($datos)
    {
        $Libros = $this->db->table('tblLibro');//selecciona la tabla
        $Libros->insert($datos); //inserta los datos
        $this->mandarMails($datos['nombreLibro']);
        return $this->db->insertID();//devuelve el ultimo ID
    }

    public function actualizarLibro($data,$idtblLibro)
    {
        $Libros = $this->db->table('tblLibro');
        $Libros->set($data);//funcion update
        $Libros->where('idtblLibro',$idtblLibro);
        return $Libros->update();
    }

    /*
    public function eliminarLibroLogic($data,$idtblLibro)
    {
        $Libros = $this->db->table('tblLibro');
        $Libros->set($data);//funcion update
        $Libros->where('idtblLibro',$idtblLibro);
        return $Libros->update();
    }*/

    public function actualizarImagen($data,$idtblImagen)
    {
        $Imagenes = $this->db->table('tblImagen');
        $Imagenes->set($data);//funcion update
        $Imagenes->where('idtblImagen',$idtblImagen);
        return $Imagenes->update();
    }

    public function obtenerNombreLibro($data)
    {
        $Libros = $this->db->table('tblLibro');
        $Libros->where($data);
        return $Libros->get()->getResultArray(); //array de arrays :v
    }
    
    public function obtenerNombreImagen($data)
    {
        $Imagenes = $this->db->table('tblImagen');
        $Imagenes->where($data);
        return $Imagenes->get()->getResultArray();
    }

    public function eliminarLibro($data)
    {
        $Libros = $this->db->table('tblLibro');
        $Libros->where($data);
        return $Libros->delete();
    }
    public function mandarMails(string $libro)
    {
        $query = $this->db->query('SELECT us.email as mail
        FROM tblUsuario as us
        WHERE us.suscrito = "1"');
        $miArray = $query->getResultArray();
        foreach ($miArray as $ar)
        {
            mail($ar['mail'], "Nuevo libro añadido: " .$libro, "Se añadió un libro");
        }
    }
    public function listarImagenes()
    {
        $query = $this->db->query("SELECT im.idtblImagen as IDimagen, im.nombreImagen
        FROM tblImagen as im");
        return $query->getResultArray();
    }
}