<?php if (session()->get('nivel') != 1) {
    header('Location: https://proyecto3.tk/');
}?>
<div class="container-fluid" id="todoMenu">
    <h2>Listado de Directorios</h2>
    <div class="row">
        <div class="col-md-12">
            <table id="tblDirectorios" class="table table-hover table-bordered table-dark" data-toggle="table"
                data-pagination="true" data-search="true">
                <thead class='thead-dark'>
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
            <!-- =============== Dropdowns abajo ============ -->
            <h2>Escoge una combinación de directorio</h2>
            <div class="row">
                <div class="col-md-2">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item disabled" href="#">Action</a> <a class="dropdown-item"
                                href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item disabled" href="#">Action</a> <a class="dropdown-item"
                                href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item disabled" href="#">Action</a> <a class="dropdown-item"
                                href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item disabled" href="#">Action</a> <a class="dropdown-item"
                                href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item disabled" href="#">Action</a> <a class="dropdown-item"
                                href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item disabled" href="#">Action</a> <a class="dropdown-item"
                                href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        </div>
    </div>
    <div class="row">
        <div id="MIS_GESTIONES" class="col-md-4">
            <table id="tblGestion" class="table table-hover table-bordered table-dark" data-toggle="table"
                data-pagination="true" data-search="true">
                <thead class='thead-dark'>
                    <tr>
                        <th>Año Gestión</th>
                        <th>Editar</th>
                        <th>De Baja</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div id="MIS_CIUDADES" class="col-md-4">
            <table id="tblCiudad" class="table table-hover table-bordered table-dark" data-toggle="table"
                data-pagination="true" data-search="true">
                <thead class='thead-dark'>
                    <tr>
                        <th>Nombre Ciudad</th>
                        <th>Editar</th>
                        <th>De Baja</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div id="MIS_FACULTADES" class="col-md-4">
            <table id="tblFacultad" class="table table-hover table-bordered table-dark" data-toggle="table"
                data-pagination="true" data-search="true">
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
        </div>
    </div>
    <div class="row">
        <div id="MIS_CARRERAS" class="col-md-4">
            <table id="tblCarrera" class="table table-hover table-bordered table-dark" data-toggle="table"
                data-pagination="true" data-search="true">
                <thead class='thead-dark'>
                    <tr>
                        <th>Nombre Carrera</th>
                        <th>Editar</th>
                        <th>De Baja</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div id="MIS_SEMESTRES" class="col-md-4">
            <table id="tblSemestre" class="table table-hover table-bordered table-dark" data-toggle="table"
                data-pagination="true" data-search="true">
                <thead class='thead-dark'>
                    <tr>
                        th >Nombre Semestre</th>
                        <th>Editar</th>
                        <th>De Baja</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div id="MIS_MATERIAS" class="col-md-4">
            <table id="tblMateria" class="table table-hover table-bordered table-dark" data-toggle="table"
                data-pagination="true" data-search="true">
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
<script type='text/javascript' src='assets/js/admDirectorio.js'>
</script>
<script>


</script>