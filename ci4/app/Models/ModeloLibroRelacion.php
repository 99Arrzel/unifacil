<?php
namespace App\Models;
use CodeIgniter\Model;

class ModeloLibroRelacion extends Model
{
    /* funcion para auto incrementar, puede ser util en otros lugares
    public function ultimoID()
    {
        $query = $this->db->query("SELECT MAX(idtblLibro)+1 AS XD FROM tblLibro");
        return $query->getResultArray();
    } */

    public function listarLibros()
    {                               
        $Libros = $this->db->query("SELECT lib.idtblLibro, lib.nombreLibro, lib.estado FROM tblLibro as lib");
        return $Libros->getResultArray();        
    }

    public function listarAutores()
    {
        $query = $this->db->query("SELECT aut.idtblAutor as IDAutor, aut.nombreAutor
        FROM tblAutor as aut");
        return $query->getResultArray();
    }

    public function listarTags()
    {
        $query = $this->db->query("SELECT tag.idtblTag as IDTag, tag.nombreTag
        FROM tblTag as tag");
        return $query->getResultArray();
    }

    public function listarFiltros()
    {
        $query = $this->db->query("SELECT * FROM DIRECTORIO");
        return $query->getResultArray();
    }

    public function insertarAutor($datosaut)
    {
        $Autores = $this->db->table('tblAutor_has_tblLibro');//selecciona la tabla
        $Autores->insert($datosaut); //inserta los datos
        //return $this->db->insertID();//devuelve el ultimo ID
    }    

    public function insertarTag($datostag)
    {
        $Tags = $this->db->table('tblTag_has_tblLibro');//selecciona la tabla
        $Tags->insert($datostag); //inserta los datos
        //return $this->db->insertID();//devuelve el ultimo ID
    } 

    public function insertarFiltro($datosfil)
    {
        $Filtros = $this->db->table('tblfiltroFinal_has_tblLibro');//selecciona la tabla
        $Filtros->insert($datosfil); //inserta los datos
        //return $this->db->insertID();//devuelve el ultimo ID
    } 

    public function actualizarLibro($data,$idtblLibro)
    {
        $Libros = $this->db->table('tblLibro');
        $Libros->set($data);//funcion update
        $Libros->where('idtblLibro',$idtblLibro);
        return $Libros->update();
    }


    public function actualizarImagen($data,$idtblImagen)
    {
        $Imagenes = $this->db->table('tblImagen');
        $Imagenes->set($data);//funcion update
        $Imagenes->where('idtblImagen',$idtblImagen);
        return $Imagenes->update();
    }

    public function actualizarAutor($data,$idtblAutor)
    {
        $Autores = $this->db->table('tblAutor');
        $Autores->set($data);//funcion update
        $Autores->where('idtblAutor',$idtblAutor);
        return $Autores->update();
    }

    public function actualizarTag($data,$idtblTag)
    {
        $Tags = $this->db->table('tblTag');
        $Tags->set($data);//funcion update
        $Tags->where('idtblTag',$idtblTag);
        return $Tags->update();
    }

    public function actualizarFiltro($data,$idfiltroFinal)
    {
        $Filtros = $this->db->table('filtroFinal');
        $Filtros->set($data);//funcion update
        $Filtros->where('idfiltroFinal',$idfiltroFinal);
        return $Filtros->update();
    }
   
}