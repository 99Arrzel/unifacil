<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Usuarios');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->match(['post'], '/ListarUsuarios/suscrito', 'adm/Admin::suscritoID');
$routes->match(['post'], '/ListarUsuarios/eliminar', 'adm/Admin::eliminarID');
$routes->match(['post'], '/ListarUsuarios/guardar', 'adm/Admin::guardarUsuarios');
$routes->match(['post'], '/ListarUsuarios/restaurar', 'adm/Admin::restaurarID');
$routes->match(['get','post'], '/ListarUsuarios', 'adm/Admin::usuarios');
// =======================Directorio=========================
// Insertar
$routes->get('/adm-dir', 'adm/EditarDirectorio::index');
$routes->match(['post'], '/adm-dir/insertarCiudad', 'adm/EditarDirectorio::insertarCiudad');
$routes->match(['post'], '/adm-dir/insertarGestion', 'adm/EditarDirectorio::insertarGestion');
$routes->match(['post'], '/adm-dir/insertarFacultad', 'adm/EditarDirectorio::insertarFacultad');
$routes->match(['post'], '/adm-dir/insertarCarrera', 'adm/EditarDirectorio::insertarCarrera');
$routes->match(['post'], '/adm-dir/insertarSemestre', 'adm/EditarDirectorio::insertarSemestre');
$routes->match(['post'], '/adm-dir/insertarMateria', 'adm/EditarDirectorio::insertarMateria');
//eliminar
$routes->match(['post'], '/adm-dir/bajaCiudad', 'adm/EditarDirectorio::bajaCiudad');
$routes->match(['post'], '/adm-dir/bajaGestion', 'adm/EditarDirectorio::bajaGestion');
$routes->match(['post'], '/adm-dir/bajaFacultad', 'adm/EditarDirectorio::bajaFacultad');
$routes->match(['post'], '/adm-dir/bajaCarrera', 'adm/EditarDirectorio::bajaCarrera');
$routes->match(['post'], '/adm-dir/bajaSemestre', 'adm/EditarDirectorio::bajaSemestre');
$routes->match(['post'], '/adm-dir/bajaMateria', 'adm/EditarDirectorio::bajaMateria');



$routes->get('/', 'Vistas::index');
$routes->get('/universidades/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)', 'Vistas::miEspacio/$1/$2/$3/$4/$5/$6'); //Universidades con ciudad, facultad, carrera y materia
$routes->get('/universidades/(:any)/(:any)/(:any)/(:any)/(:any)', 'Vistas::materias/$1/$2/$3/$4/$5'); //Universidades con ciudad, facultad, carrera y materia
$routes->get('/universidades/(:any)/(:any)/(:any)/(:any)', 'Vistas::semestres/$1/$2/$3/$4'); //Universidades con ciudad, facultad, carrera y materia
$routes->get('/universidades/(:any)/(:any)/(:any)', 'Vistas::carreras/$1/$2/$3'); //Universidades con ciudad, facultad y carrera
$routes->get('/universidades/(:any)/(:any)', 'Vistas::facultades/$1/$2'); //Universidades con una ciudad y una facultad
$routes->get('/universidades/(:any)', 'Vistas::unis/$1'); //Universidades con una ciudad

//--->Rutas para la vista arriba, una poronga, tiene que tener ese orden especifico XD
$routes->get('/logout', 'Usuarios::logout');
$routes->get('/ciudad','Ciudad::index');//ruta ciudad
$routes->get('/obtenerNombre/(:any)','Ciudad::obtenerNombre/$1');//ruta obtener nombre
$routes->post('/crear','Ciudad::crear');//ruta para insert
$routes->post('/actualizar','Ciudad::actualizar');//ruta para update
$routes->get('/eliminar/(:any)','Ciudad::eliminar/$1');//ruta para delete

$routes->get('/autor','Autor::index');//ruta autor
$routes->get('/obtenerNombreAutor/(:any)','Autor::obtenerNombreAutor/$1');//ruta obtener nombre
$routes->post('/crearAutor','Autor::crearAutor');//ruta para insert autor
$routes->post('/actualizarAutor','Autor::actualizarAutor');//ruta para update autor
$routes->get('/eliminarAutor/(:any)','Autor::eliminarAutor/$1');//ruta para delete autor

$routes->get('/facultad','Facultad::index');//ruta facultad
$routes->get('/obtenerNombreFacultad/(:any)','Facultad::obtenerNombreFacultad/$1');//ruta obtener nombre
$routes->post('/crearFacultad','Facultad::crearFacultad');//ruta para insert facultad
$routes->post('/actualizarFacultad','Facultad::actualizarFacultad');//ruta para update facultad
$routes->get('/eliminarFacultad/(:any)','Facultad::eliminarFacultad/$1');//ruta para delete facultad

$routes->get('/materia','Materia::index');//ruta materia
$routes->get('/obtenerNombreMateria/(:any)','Materia::obtenerNombreMateria/$1');//ruta obtener nombre
$routes->post('/crearMateria','Materia::crearMateria');//ruta para insert materia
$routes->post('/actualizarMateria','Materia::actualizarMateria');//ruta para update materia
$routes->get('/eliminarMateria/(:any)','Materia::eliminarMateria/$1');//ruta para delete materia

$routes->get('/tag','Tag::index');//ruta tag
$routes->get('/obtenerNombreTag/(:any)','Tag::obtenerNombreTag/$1');//ruta obtener nombre
$routes->post('/crearTag','Tag::crearTag');//ruta para insert tag
$routes->post('/actualizarTag','Tag::actualizarTag');//ruta para update tag
$routes->get('/eliminarTag/(:any)','Tag::eliminarTag/$1');//ruta para delete tag

$routes->get('/imagen','Imagen::index');//ruta imagen
$routes->get('/obtenerNombreImagen/(:any)','Imagen::obtenerNombreImagen/$1');//ruta obtener nombre
$routes->post('/crearImagen','Imagen::crearImagen');//ruta para insert imagen
$routes->post('/actualizarImagen','Imagen::actualizarImagen');//ruta para update imagen
$routes->get('/eliminarImagen/(:any)','Imagen::eliminarImagen/$1');//ruta para delete imagen

//$routes->get('/automail','Automail::send');
$routes->get('/add_mail','Automail::index');//ruta imagen
$routes->post('/crearMail','Automail::crearMail');

$routes->get('/stat','Stat::index');//prueba XD

$routes->get('/libro','Libro::index');//ruta libro
$routes->post('/crearLibro','Libro::crearLibro');//ruta para insert imagen
$routes->get('/obtenerNombreLibro/(:any)','Libro::obtenerNombreLibro/$1');
//$routes->get('/obtenerNombreImagen/(:any)','Libro::obtenerNombreImagen/$1');
$routes->post('/actualizarLibro','Libro::actualizarLibro');//ruta para update imagen
$routes->get('/eliminarLibro/(:any)','Libro::eliminarLibro/$1');//ruta para delete imagen
$routes->post('/eliminarLibroLogic','Libro::eliminarLibroLogic');

$routes->get('/librofiltro','LibroFiltro::index');//ruta libro
$routes->get('/obtenerNombreLibro/(:any)','LibroFiltro::obtenerNombreLibro/$1');


$routes->match(['get','post'],'registrar','Usuarios::registrar');
$routes->match(['get','post'],'login','Usuarios::login');
$routes->match(['get','post'],'perfil','Usuarios::perfil');
$routes->match(['get','post'],'contacto','Usuarios::contacto');
$routes->match(['get','post'],'gatoPiola','Usuarios::gatoPiola');
$routes->match(['get','post'],'libros_lista','Libros_lista::index');
$routes->match(['get','post'],'examenes_lista','Examenes_lista::index');




/*
Ciclo para mostrar las otras rutas, solo cuenta con universidades, tengo que igual con una consulta las universidades y sus carreras.

*/


/* Parece funcionar correctamente, chequearlo igual, todas las vistas de la base son generadas en*/

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
