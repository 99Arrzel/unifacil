<?php if (session()->get('nivel') != 1) {
    header('Location: https://proyecto3.tk/');
}?>
<div class="modal fade" id="dropEdit" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div id="myModal" class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="labelEditQue">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class='table table-bordered bg-dark text-light'>
                <div class="modal-body">
                    <table id="insertar" class='col-12 table table-dark'>
                        <thead class='thead-dark'>
                            <tr>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <h3 class="modal-title" id="direccionEditar" hidden></h5>
                        <form autocomplete="off">
                            <tbody>
                                <tr>
                                    <td><input id="nombreModal" autocomplete="off" type='text' name='nombreModal'
                                            class='form-control'></input></td>
                                    <td><button id="btnModal" name="btnModal" value="" type='submit'
                                            class='btn btn-success form-control' data-dismiss="modal" onclick="editRequest()">Enviar
                                    </td>
                                </tr>
                            </tbody>
                        </form>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<!-- ============================== MODAL ARRIBA ==========================-->
<div class="container-fluid" id="todoMenu">
    <h2>Listado de Directorios</h2>
    <button id='botonOcultarDir' type='button' onclick='mostrarDir()' class='btn btn-primary'>Mostrar de baja</button>
    <div class="row">
        <div class="col-md-12" id="listaDeAltaDir">
            <div class='table table-bordered bg-dark text-light'>
                <div class="table-responsive">
                    <table class="table table-hover" id="tblDirectorios">
                        <thead class="thead-dark">
                            <tr>
                                <th>Ciudad</th>
                                <th>Gestión</th>
                                <th>Facultad</th>
                                <th>Carrera</th>
                                <th>Semestre</th>
                                <th>Materia</th>
                                <th>Dar de baja</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12" id="listaDeBajaDir">
            <div class='table table-bordered bg-dark text-light'>
                <div class="table-responsive">
                    <table class="table table-hover" id="tblDirectoriosBaja">
                        <thead class="thead-dark">
                            <tr>
                                <th>Ciudad</th>
                                <th>Gestión</th>
                                <th>Facultad</th>
                                <th>Carrera</th>
                                <th>Semestre</th>
                                <th>Materia</th>
                                <th>Dar de alta</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- =============== Dropdowns abajo ============ -->
    <h2>Escoge una combinación de directorio</h2>
</div>
<!-- =============== Dropdowns arriba ============ -->
<div class="row">
    <div class="col-md-4">
        <form role="form">
            <h3>Gestion</h3>
            <div class="input-group mb-3">
                <input id="gestion" type="text" class="form-control" onkeypress="return event.keyCode!=13">
                <div class="input-group-append">
                    <button onclick="insertarGestion()" class="btn btn-success" type="button">Insertar</button>
                </div>
            </div>
        </form>
    <button id='botonOcultarGes' type='button' onclick='mostrarGes()' class='btn btn-primary'>Mostrar de baja</button>
    </div>
    <div class="col-md-4">
        <form role="form">
            <h3>Ciudad</h3>
            <div class="input-group mb-3">
                <input id="ciudad" type="text" class="form-control" onkeypress="return event.keyCode!=13">
                <div class="input-group-append">
                    <button onclick="insertarCiudad()" class="btn btn-success" type="button">Insertar</button>
                </div>
            </div>
        </form>
        <button id='botonOcultarCiu' type='button' onclick='mostrarCiu()' class='btn btn-primary'>Mostrar de baja</button>
    </div>
    <div class="col-md-4">
        <form role="form">
            <h3>Facultad</h3>
            <div class="input-group mb-3">
                <input id="facultad" type="text" class="form-control" onkeypress="return event.keyCode!=13">
                <div class="input-group-append">
                    <button onclick="insertarFacultad()" class="btn btn-success" type="button">Insertar</button>
                </div>
            </div>
        </form>
        <button id='botonOcultarFac' type='button' onclick='mostrarFac()' class='btn btn-primary'>Mostrar de baja</button>
    </div>
</div>
<div class="row">
    <div id="MIS_GESTIONES" class="col-md-4">
        <div class='table table-bordered bg-dark text-light'>
            <div class="table-responsive">
                <table id="tblGestion" class="table table-hover table-bordered table-dark">
                    <thead class='thead-dark'>
                        <tr>
                            <th>Año Gestión</th>
                            <th>Editar</th>
                            <th>De Baja</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div id="MIS_GESTIONESBAJA" class="col-md-4">
        <div class='table table-bordered bg-dark text-light'>
            <div class="table-responsive">
                <table id="tblGestionBaja" class="table table-hover table-bordered table-dark">
                    <thead class='thead-dark'>
                        <tr>
                            <th>Año Gestión</th>
                            <th>Editar</th>
                            <th>De Alta</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div id="MIS_CIUDADES" class="col-md-4">
        <div class='table table-bordered bg-dark text-light'>
            <div class="table-responsive">
                <table id="tblCiudad" class="table table-hover table-bordered table-dark">
                    <thead class='thead-dark'>
                        <tr>
                            <th>Nombre Ciudad</th>
                            <th>Editar</th>
                            <th>De Baja</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div id="MIS_CIUDADESBAJA" class="col-md-4">
        <div class='table table-bordered bg-dark text-light'>
            <div class="table-responsive">
                <table id="tblCiudadBaja" class="table table-hover table-bordered table-dark">
                    <thead class='thead-dark'>
                        <tr>
                            <th>Nombre Ciudad</th>
                            <th>Editar</th>
                            <th>De Alta</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div id="MIS_FACULTADES" class="col-md-4">
        <div class='table table-bordered bg-dark text-light'>
            <div class="table-responsive">
                <table id="tblFacultad" class="table table-hover table-bordered table-dark">
                    <thead class='thead-dark'>
                        <tr>
                            <th>Nombre Facultad</th>
                            <th>Editar</th>
                            <th>De Baja</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div id="MIS_FACULTADESBAJA" class="col-md-4">
        <div class='table table-bordered bg-dark text-light'>
            <div class="table-responsive">
                <table id="tblFacultadBaja" class="table table-hover table-bordered table-dark">
                    <thead class='thead-dark'>
                        <tr>
                            <th>Nombre Facultad</th>
                            <th>Editar</th>
                            <th>De Alta</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <form role="form">
            <h3>Carrera</h3>
            <div class="input-group mb-3">
                <input id="carrera" type="text" class="form-control" onkeypress="return event.keyCode!=13">
                <div class="input-group-append">
                    <button onclick="insertarCarrera()" class="btn btn-success" type="button">Insertar</button>
                </div>
            </div>
        </form>
        <button id='botonOcultarCar' type='button' onclick='mostrarCar()' class='btn btn-primary'>Mostrar de baja</button>
    </div>
    <div class="col-md-4">
        <form role="form">
            <h3>Semestre</h3>
            <div class="input-group mb-3">
                <input id="semestre" type="text" class="form-control" onkeypress="return event.keyCode!=13">
                <div class="input-group-append">
                    <button onclick="insertarSemestre()" class="btn btn-success" type="button">Insertar</button>
                </div>
            </div>
        </form>
        <button id='botonOcultarSem' type='button' onclick='mostrarSem()' class='btn btn-primary'>Mostrar de baja</button>
    </div>
    <div class="col-md-4">
        <form role="form">
            <h3>Materia</h3>
            <div class="input-group mb-3">
                <input id="materia" type="text" class="form-control" onkeypress="return event.keyCode!=13">
                <div class="input-group-append">
                    <button onclick="insertarMateria()" class="btn btn-success" type="button">Insertar</button>
                </div>
            </div>
        </form>
        <button id='botonOcultarMat' type='button' onclick='mostrarMat()' class='btn btn-primary'>Mostrar de baja</button>
    </div>
</div>
<div class="row">
    <div id="MIS_CARRERAS" class="col-md-4">
        <div class='table table-bordered bg-dark text-light'>
            <div class="table-responsive">
                <table id="tblCarrera" class="table table-hover table-bordered table-dark">
                    <thead class='thead-dark'>
                        <tr>
                            <th>Nombre Carrera</th>
                            <th>Editar</th>
                            <th>De Baja</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div id="MIS_CARRERASBAJA" class="col-md-4">
        <div class='table table-bordered bg-dark text-light'>
            <div class="table-responsive">
                <table id="tblCarreraBaja" class="table table-hover table-bordered table-dark">
                    <thead class='thead-dark'>
                        <tr>
                            <th>Nombre Carrera</th>
                            <th>Editar</th>
                            <th>De Baja</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div id="MIS_SEMESTRES" class="col-md-4">
        <div class='table table-bordered bg-dark text-light'>
            <div class="table-responsive">
                <table id="tblSemestre" class="table table-hover table-bordered table-dark">
                    <thead class='thead-dark'>
                        <tr>
                            <th>Nombre Semestre</th>
                            <th>Editar</th>
                            <th>De Baja</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div id="MIS_SEMESTRESBAJA" class="col-md-4">
        <div class='table table-bordered bg-dark text-light'>
            <div class="table-responsive">
                <table id="tblSemestreBaja" class="table table-hover table-bordered table-dark">
                    <thead class='thead-dark'>
                        <tr>
                            <th>Nombre Semestre</th>
                            <th>Editar</th>
                            <th>De Baja</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div id="MIS_MATERIAS" class="col-md-4">
        <div class='table table-bordered bg-dark text-light'>
            <div class="table-responsive">
                <table id="tblMateria" class="table table-hover table-bordered table-dark">
                    <thead class='thead-dark'>
                        <tr>
                            <th>Nombre Materia</th>
                            <th>Editar</th>
                            <th>De Baja</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div id="MIS_MATERIASBAJA" class="col-md-4">
        <div class='table table-bordered bg-dark text-light'>
            <div class="table-responsive">
                <table id="tblMateriaBaja" class="table table-hover table-bordered table-dark">
                    <thead class='thead-dark'>
                        <tr>
                            <th>Nombre Materia</th>
                            <th>Editar</th>
                            <th>De Baja</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<table class="table">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							Product
						</th>
						<th>
							Payment Taken
						</th>
						<th>
							Status
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							1
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Default
						</td>
					</tr>
					<tr class="table-active">
						<td>
							1
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Approved
						</td>
					</tr>
					<tr class="table-success">
						<td>
							2
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							02/04/2012
						</td>
						<td>
							Declined
						</td>
					</tr>
					<tr class="table-warning">
						<td>
							3
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							03/04/2012
						</td>
						<td>
							Pending
						</td>
					</tr>
					<tr class="table-danger">
						<td>
							4
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							04/04/2012
						</td>
						<td>
							Call in to confirm
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-6">
			<table class="table">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							Product
						</th>
						<th>
							Payment Taken
						</th>
						<th>
							Status
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							1
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Default
						</td>
					</tr>
					<tr class="table-active">
						<td>
							1
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Approved
						</td>
					</tr>
					<tr class="table-success">
						<td>
							2
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							02/04/2012
						</td>
						<td>
							Declined
						</td>
					</tr>
					<tr class="table-warning">
						<td>
							3
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							03/04/2012
						</td>
						<td>
							Pending
						</td>
					</tr>
					<tr class="table-danger">
						<td>
							4
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							04/04/2012
						</td>
						<td>
							Call in to confirm
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<table class="table">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							Product
						</th>
						<th>
							Payment Taken
						</th>
						<th>
							Status
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							1
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Default
						</td>
					</tr>
					<tr class="table-active">
						<td>
							1
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Approved
						</td>
					</tr>
					<tr class="table-success">
						<td>
							2
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							02/04/2012
						</td>
						<td>
							Declined
						</td>
					</tr>
					<tr class="table-warning">
						<td>
							3
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							03/04/2012
						</td>
						<td>
							Pending
						</td>
					</tr>
					<tr class="table-danger">
						<td>
							4
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							04/04/2012
						</td>
						<td>
							Call in to confirm
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-6">
			<table class="table">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							Product
						</th>
						<th>
							Payment Taken
						</th>
						<th>
							Status
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							1
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Default
						</td>
					</tr>
					<tr class="table-active">
						<td>
							1
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Approved
						</td>
					</tr>
					<tr class="table-success">
						<td>
							2
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							02/04/2012
						</td>
						<td>
							Declined
						</td>
					</tr>
					<tr class="table-warning">
						<td>
							3
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							03/04/2012
						</td>
						<td>
							Pending
						</td>
					</tr>
					<tr class="table-danger">
						<td>
							4
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							04/04/2012
						</td>
						<td>
							Call in to confirm
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="#">Home</a>
					</li>
					<li class="breadcrumb-item">
						<a href="#">Library</a>
					</li>
					<li class="breadcrumb-item active">
						Data
					</li>
				</ol>
			</nav>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://proyecto3.tk/assets/js/admDirectorio.js"></script>