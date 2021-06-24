<?php
namespace App\Controllers\adm;
use App\Models\ModeloADM\ModeloDirectorio; //Include de tablas de filtro
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
    //====================================================================
    public function ajaxListDirectorio()
    {
        $datosdir = ( new ModeloDirectorio() )->ListarDirectorio();
        echo json_encode($datosdir);
    }
    public function ajaxListMateria()
    {
        $listarMaterias = (new ModeloMateria() )->listarMaterias();
        echo json_encode($listarMaterias);
    }
    public function ajaxListSemestre()
    {
        $listarSemestres = (new ModeloSemestre() )->listarSemestres();
        echo json_encode($listarSemestres);
    }
    public function ajaxListCarrera()
    {
        $listarCarreras = (new ModeloCarrera() )->listarCarreras();
        echo json_encode($listarCarreras);
    }
    public function ajaxListFacultad()
    {
        $listarFacultades = (new ModeloFacultad() )->listarFacultades();
        echo json_encode($listarFacultades);
    }
    public function ajaxListGestion()
    {
        $listarGestiones = (new ModeloGestion() )->listarGestiones();
        echo json_encode($listarGestiones);
    }
    public function ajaxListCiudad()
    {
        $listarCiudades = (new ModeloCiudad() )->listarCiudades();
        echo json_encode($listarCiudades);
    }
    // ================================Baja para ABAJO ==================================================================
    public function ajaxListDirectorioBaja()
    {
        $datosdir = ( new ModeloDirectorio() )->ListarDirectorioHidden();
        echo json_encode($datosdir);
    }
    public function ajaxListMateriaBaja()
    {
        $listarMaterias = (new ModeloMateria() )->listarMateriasBaja();
        echo json_encode($listarMaterias);
    }
    public function ajaxListSemestreBaja()
    {
        $listarSemestres = (new ModeloSemestre() )->listarSemestresBaja();
        echo json_encode($listarSemestres);
    }
    public function ajaxListCarreraBaja()
    {
        $listarCarreras = (new ModeloCarrera() )->listarCarrerasBaja();
        echo json_encode($listarCarreras);
    }
    public function ajaxListFacultadBaja()
    {
        $listarFacultades = (new ModeloFacultad() )->listarFacultadesBaja();
        echo json_encode($listarFacultades);
    }
    public function ajaxListGestionBaja()
    {
        $listarGestiones = (new ModeloGestion() )->listarGestionesBaja();
        echo json_encode($listarGestiones);
    }
    public function ajaxListCiudadBaja()
    {
        $listarCiudades = (new ModeloCiudad() )->listarCiudadesBaja();
        echo json_encode($listarCiudades);
    }
    //====================================================================

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
    //Request de baja abajo ====================================================================
    public function bajaDirectorio()
    {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $model = new ModeloDirectorio();
            $dir = [
                'idfiltroFinal' => $id,
                'estado' => "0",
            ];
            $model->save( $dir );
            echo'{"baja":true}';
        }
    }
    public function bajaCiudad()
    {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $model = new ModeloCiudad();
            $ciudad = [
                'idtblCiudad' => $id,
                'estado' => "0",
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function bajaGestion()
    {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost('miid');
            $model = new ModeloGestion();
            $ciudad = [
                'idtblGestion' => $id,
                'estado' => "0",
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function bajaFacultad()
    {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $model = new ModeloFacultad();
            $ciudad = [
                'idtblFacultad' => $id,
                'estado' => "0",
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function bajaCarrera()
    {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $model = new ModeloCarrera();
            $ciudad = [
                'idtblCarrera' => $id,
                'estado' => "0",
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function bajaSemestre()
    {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $model = new ModeloSemestre();
            $ciudad = [
                'idtblSemestre' => $id,
                'estado' => "0",
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function bajaMateria()
    {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $model = new ModeloMateria();
            $ciudad = [
                'idtblMateria' => $id,
                'estado' => "0",
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function resDirectorio()
    {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $model = new ModeloDirectorio();
            $dir = [
                'idfiltroFinal' => $id,
                'estado' => "1",
            ];
            $model->save( $dir );
            echo'{"baja":true}';
        }
    }
    public function resGestion()
    {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost('miid');
            $model = new ModeloGestion();
            $ciudad = [
                'idtblGestion' => $id,
                'estado' => "1",
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function resCiudad()
    {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $model = new ModeloCiudad();
            $ciudad = [
                'idtblCiudad' => $id,
                'estado' => "1",
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function resFacultad()
    {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $model = new ModeloFacultad();
            $ciudad = [
                'idtblFacultad' => $id,
                'estado' => "1",
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function resCarrera()
    {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $model = new ModeloCarrera();
            $ciudad = [
                'idtblCarrera' => $id,
                'estado' => "1",
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function resSemestre()
    {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $model = new ModeloSemestre();
            $ciudad = [
                'idtblSemestre' => $id,
                'estado' => "1",
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function resMateria()
    {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $model = new ModeloMateria();
            $ciudad = [
                'idtblMateria' => $id,
                'estado' => "1",
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    //Para editar nombres
    public function editGestion()
    {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $nombre = $this->request->getPost( 'nombre' );
            $model = new ModeloGestion();
            $ciudad = [
                'idtblGestion' => $id,
                'nombreGestion' => $nombre,
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function editCiudad()
    {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $nombre = $this->request->getPost( 'nombre' );
            $model = new ModeloCiudad();
            $ciudad = [
                'idtblCiudad' => $id,
                'nombreCiudad' => $nombre,
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function editFacultad()
    {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $nombre = $this->request->getPost( 'nombre' );
            $model = new ModeloFacultad();
            $ciudad = [
                'idtblFacultad' => $id,
                'nombreFacultad' => $nombre,
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function editCarrera()
    {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $nombre = $this->request->getPost( 'nombre' );
            $model = new ModeloCarrera();
            $ciudad = [
                'idtblCarrera' => $id,
                'nombreCarrera' => $nombre,
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function editSemestre()
    {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $nombre = $this->request->getPost( 'nombre' );
            $model = new ModeloSemestre();
            $ciudad = [
                'idtblSemestre' => $id,
                'nombreSemestre' => $nombre,
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }
    public function editMateria()
    {
        if ( $this->request->isAJAX() ) {
            $id = $this->request->getPost( 'miid' );
            $nombre = $this->request->getPost( 'nombre' );
            $model = new ModeloMateria();
            $ciudad = [
                'idtblMateria' => $id,
                'nombreMateria' => $nombre,
            ];
            $model->save( $ciudad );
            echo'{"baja":true}';
        }
    }

}
