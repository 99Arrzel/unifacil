<?php
namespace App\Models;
use CodeIgniter\Model;

class ModeloExamenFiltro extends Model
{
    public function ultimoID()
    {
        $query = $this->db->query("SELECT MAX(idtblExamen)+1 AS XD FROM tblExamen");
        return $query->getResultArray();
    }

    public function listarExamenes()
    {                               
        $nExamenesnes = $this->db->query("SELECT * FROM EXAMENES_FILTRO");
        return $nExamenesnes->getResultArray();        
    }

    public function listarImagenes()
    {
        $query = $this->db->query("SELECT im.idtblImagen as IDimagen, im.nombreImagen
        FROM tblImagen as im");
        return $query->getResultArray();
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

    public function insertarExamen($datos)
    {
        $Examenes = $this->db->table('tblExamen');//selecciona la tabla
        $Examenes->insert($datos); //inserta los datos
        $this->mandarMails($datos['nombreExamen']);
        return $this->db->insertID();//devuelve el ultimo ID
    }


    public function insertarTag($datostag)
    {
        $Tags = $this->db->table('tblTag_has_tblExamen');//selecciona la tabla
        $Tags->insert($datostag); //inserta los datos
        //return $this->db->insertID();//devuelve el ultimo ID
    } 

    public function insertarFiltro($datosfil)
    {
        $Filtros = $this->db->table('tblfiltroFinal_has_tblExamen');//selecciona la tabla
        $Filtros->insert($datosfil); //inserta los datos
        //return $this->db->insertID();//devuelve el ultimo ID
    } 

    public function actualizarExamen($data,$idtblExamen)
    {
        $nExamenes = $this->db->table('tblExamen');
        $nExamenes->set($data);//funcion update
        $nExamenes->where('idtblExamen',$idtblExamen);
        return $nExamenes->update();
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




    public function obtenerNombreExamen($data)
    {
        $Examenes = $this->db->table('tblExamen');
        $Examenes->where($data);
        return $Examenes->get()->getResultArray(); //array de arrays :v
    }
    
    public function obtenerNombreImagen($data)
    {
        $Imagenes = $this->db->table('tblImagen');
        $Imagenes->where($data);
        return $Imagenes->get()->getResultArray();
    }

    public function obtenerNombreAutor($data)
    {
        $Autores = $this->db->table('tblAutor');
        $Autores->where($data);
        return $Autores->get()->getResultArray();
    }

    public function obtenerNombreTag($data)
    {
        $Tags = $this->db->table('tblTag');
        $Tags->where($data);
        return $Tags->get()->getResultArray();
    }

    public function obtenerNombreFiltro($data)
    {
        $Filtros = $this->db->table('filtroFinal');
        $Filtros->where($data);
        return $Filtros->get()->getResultArray();
    }


    public function eliminarExamen($data)
    {
        $Examenes = $this->db->table('tblExamen');
        $Examenes->where($data);
        return $Examenes->delete();
    }
    public function mandarMails(string $examen)
    {
        $query = $this->db->query('SELECT us.email as mail
        FROM tblUsuario as us
        WHERE us.suscrito = "1"');
        $miArray = $query->getResultArray();
        foreach ($miArray as $ar)
        {
            mail($ar['mail'], "Nuevo nExamenesn añadido: " .$examen, "Se añadió un nExamenesn");
        }
    }
   
}