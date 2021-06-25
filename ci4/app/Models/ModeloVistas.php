<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeloVistas extends Model
{
    public function agarrarCiudades()
    {
        $query = $this->db->query('SELECT CIUDAD FROM `DIRECTORIO` GROUP BY CIUDAD');
        return $query->getResultArray();
    }
    public function agarrarGestionPorCiudad(string $ciudad)
    {
        $query = $this->db->query("SELECT * FROM `DIRECTORIO` WHERE CIUDAD = '".$ciudad."' GROUP BY GESTION");
        return $query->getResultArray();
    }

    public function agarrarFacultadPorCiudad(string $ciudad, string $Gestion)
    {
        $query = $this->db->query("SELECT * FROM `DIRECTORIO` WHERE `CIUDAD` = '".$ciudad."' AND `GESTION` = '".$Gestion."' GROUP BY FACULTAD" );
        return $query->getResultArray();
    }

    public function agarrarCarrerasPorCiudad(string $ciudad, string $Gestion, string $facultad)
    {
        $query = $this->db->query("SELECT * FROM `DIRECTORIO` WHERE `CIUDAD` = '".$ciudad."' AND `GESTION` = '".$Gestion."' AND `FACULTAD` = '".$facultad."' GROUP BY CARRERA");
        return $query->getResultArray();
    }

    public function agarrarSemestrePorCarrera(string $ciudad, string $Gestion, string $facultad, string $carrera)
    {
        $query = $this->db->query("SELECT * FROM `DIRECTORIO`  WHERE `CIUDAD` = '".$ciudad."' AND `GESTION` = '".$Gestion."' AND `FACULTAD` = '".$facultad."' AND `CARRERA` = '".$carrera."' GROUP BY SEMESTRE");
        return $query->getResultArray();
    }

    public function agarrarMateriasPorSemestre(string $ciudad, string $Gestion, string $facultad, string $carrera, string $semestre)
    {
        $query = $this->db->query("SELECT * FROM `DIRECTORIO`  WHERE `CIUDAD` = '".$ciudad."' AND `GESTION` = '".$Gestion."' AND `FACULTAD` = '".$facultad."' AND `CARRERA` = '".$carrera."' AND `SEMESTRE` = '".$semestre."' AND `ESTADO` = 1");
        return $query->getResultArray();
    }
    public function agarrarLibrosDirectorio(string $ciudad, string $gestion, string $facultad, string $carrera, string $semestre, string $materia)
    {
        $query = $this->db->query("CALL LISTALIBROS('".$ciudad."', '".$gestion."','".$facultad."','".$carrera."','".$semestre."','".$materia."', 1)");
        return $query->getResultArray();
    }
    public function agarrarExamenesDirectorio(string $ciudad, string $gestion, string $facultad, string $carrera, string $semestre, string $materia)
    {
        $query = $this->db->query("CALL LISTAEXAMENES('".$ciudad."', '".$gestion."','".$facultad."','".$carrera."','".$semestre."','".$materia."',1)");
        return $query->getResultArray();
    }
    
}