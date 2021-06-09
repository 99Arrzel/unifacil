<?php
namespace App\Models;
use CodeIgniter\Model;

class ModeloLibroFiltro extends Model
{
    public function listarLibros()
    {                               
        $Libros = $this->db->query("SELECT
        lib.idtblLibro,
        `lib`.`nombreLibro` AS `nombreLibro`,
        `lib`.`year` AS `year`,
        `lib`.`edicion` AS `edicion`,
        `lib`.`dirDoc` AS `dirDoc`,
        lib.estado, 
        lib.tblImagen_idtblImagen ,
        ima.idtblImagen,
        ima.nombreImagen,
        ima.dirImagen,
        GROUP_CONCAT( DISTINCT n.idtblAutor SEPARATOR ', ') AS idtblAutor,
        GROUP_CONCAT(
            DISTINCT `n`.`nombreAutor` SEPARATOR ', '
        ) AS `autores`,
        GROUP_CONCAT(DISTINCT tag.idtblTag SEPARATOR ', ') as IDsTags,
        
        GROUP_CONCAT(
            DISTINCT `tag`.`nombreTag` SEPARATOR ', ') AS `tags`, 
        GROUP_CONCAT( DISTINCT ff.idfiltroFinal SEPARATOR', ') as filtros 
    FROM
                       
                            `altillo`.`tblLibro` `lib`
                        JOIN `altillo`.`tblAutor_has_tblLibro` `c`
                        
                    JOIN `altillo`.`tblAutor` `n`
                    
                JOIN `altillo`.`tblImagen` `ima`
                
            JOIN `altillo`.`tblTag` `tag`
       
        JOIN `altillo`.`tblTag_has_tblLibro` `ltag`
        JOIN filtroFinal ff JOIN tblfiltroFinal_has_tblLibro flib
    WHERE
        (
            (
                `lib`.`idtblLibro` = `c`.`tblLibro_idtblLibro`
            ) AND(
                `c`.`tblAutor_idtblAutor` = `n`.`idtblAutor`
            ) AND(
                `ima`.`idtblImagen` = `lib`.`tblImagen_idtblImagen`
            ) AND(
                `lib`.`idtblLibro` = `ltag`.`tblLibro_idtblLibro`
            ) AND(
                `tag`.`idtblTag` = `ltag`.`tblTag_idtblTag`
            )AND ff.idfiltroFinal = flib.idfiltroFinal_Union AND lib.idtblLibro = flib.idtblLibro_Union
        )
    GROUP BY
        `lib`.`nombreLibro`");
        return $Libros->getResultArray();        
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
        $query = $this->db->query("SELECT fil.idfiltroFinal as IDFiltro
        FROM filtroFinal as fil");
        return $query->getResultArray();
    }

    //protected $table = 'tblLibro';
    //protected $primaryKey = 'idtblLibro';
    //protected $allowedFields = ['idtblLibro','nombreLibro',
    //'year','edicion','dirDor',
    //'tblImagen_idtblImagen'];    
    
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

    public function obtenerNombreAutor($data)
    {
        $Autores = $this->db->table('tblAutor');
        $Autores->where($data);
        return $Autores->get()->getResultArray();
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
   
}