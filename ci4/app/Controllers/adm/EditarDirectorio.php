<?php
namespace App\Controllers\adm;
use App\Models\ModeloADM\ModeloDirectorio;
// =================== ACÁ PARA MODELOS DE TABLAS SIMPLES
use App\Models\ModeloCiudad;
use App\Models\ModeloGestion;
use App\Models\ModeloFacultad;
use App\Models\ModeloCarrera;
use App\Models\ModeloSemestre;
use App\Models\ModeloMateria;
// ===================
use App\Controllers\BaseController;
class editarDirectorio extends BaseController
{
    public function index() {
        //( string $ciudad, string $gestion, string $facultad, string $carrera, string $semestre, string $materia )
        //navbar
        $datosdir = ( new ModeloDirectorio() )->ListarDirectorio();
        $datosdirHidden = ( new ModeloDirectorio() )->ListarDirectorioHidden();
        $listarCiudades = (new ModeloCiudad() )->listarCiudades();
        $listarGestiones = (new ModeloGestion() )->listarGestiones();
        $listarFacultades = (new ModeloFacultad() )->listarFacultades();
        $listarCarreras = (new ModeloCarrera() )->listarCarreras();
        $listarSemestres = (new ModeloSemestre() )->listarSemestres();
        $listarMaterias = (new ModeloMateria() )->listarMaterias();
        $data = [
            'dir' => $datosdir, //datosdir
            'dirHidden' => $datosdirHidden, //datosdir
            'listarCiudades' => $listarCiudades,
            'listarGestiones' => $listarGestiones,
            'listarFacultades' => $listarFacultades,
            'listarCarreras' => $listarCarreras,
            'listarSemestres' => $listarSemestres,
            'listarMaterias' => $listarMaterias,
        ];
        echo view( 'templates/header', $data );
        echo view( '/admin/directorios');
        return       view( 'templates/footer' );
    }
    public function insertarCiudad()
    {
        if ( $this->request->isAJAX() ) {
            $nombre = $this->request->getPost( 'nombre' );
            $model = new ModeloCiudad();
            $ciudad = [
                'nombreCiudad' => $nombre,
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function insertarGestion()
    {
        if ( $this->request->isAJAX() ) {
            $nombre = $this->request->getPost('nombre');
            $model = new ModeloGestion();
            $ciudad = [
                'nombreGestion' => $nombre,
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function insertarFacultad()
    {
        if ( $this->request->isAJAX() ) {
            $nombre = $this->request->getPost( 'nombre' );
            $model = new ModeloFacultad();
            $ciudad = [
                'nombreFacultad' => $nombre,
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function insertarCarrera()
    {
        if ( $this->request->isAJAX() ) {
            $nombre = $this->request->getPost( 'nombre' );
            $model = new ModeloCarrera();
            $ciudad = [
                'nombreCarrera' => $nombre,
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function insertarSemestre()
    {
        if ( $this->request->isAJAX() ) {
            $nombre = $this->request->getPost( 'nombre' );
            $model = new ModeloSemestre();
            $ciudad = [
                'nombreSemestre' => $nombre,
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function insertarMateria()
    {
        if ( $this->request->isAJAX() ) {
            $nombre = $this->request->getPost( 'nombre' );
            $model = new ModeloMateria();
            $ciudad = [
                'nombreMateria' => $nombre,
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
}