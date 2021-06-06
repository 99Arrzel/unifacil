<?php if (session()->get('nivel') != 1) {
    header('Location: http://proyecto3.tk/');
}?>
<div class="container-fluid" id="todoMenu">
    <h2>Listado de Directorios</h2>
    <div class="row">
        <div class="col-md-12">
            <table id="tblDirectorios" class="table table-hover table-bordered table-dark" data-toggle="table"
                data-pagination="true" data-search="true">
                <thead class='thead-dark'>
                    <tr>
                        <th data-sortable="true">Ciudad</th>
                        <th data-sortable="true">Gestión</th>
                        <th data-sortable="true">Facultad</th>
                        <th data-sortable="true">Carrera</th>
                        <th data-sortable="true">Semestre</th>
                        <th data-sortable="true">Materia</th>
                        <th>Dar de baja</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dir as $dirdata): ?>
                    <form action="/adm-dir/eliminar" method="post"
                        id='form<?=$dirdata['ID']?>'>
                        <tr>
                            <td>
                                <a><?=$dirdata['CIUDAD']?></a>
                            </td>
                            <td>
                                <a><?=$dirdata['GESTION']?></a>
                            </td>
                            <td>
                                <a><?=$dirdata['FACULTAD']?></a>
                            </td>
                            <td>
                                <a><?=$dirdata['CARRERA']?></a>
                            </td>
                            <td>
                                <a><?=$dirdata['SEMESTRE']?></a>
                            </td>
                            <td>
                                <a><?=$dirdata['MATERIA']?></a>
                            </td>
                            <td>
                                <button type="submit" name="idDir"
                                    value="<?=$dirdata['ID']?>"
                                    id='borrar<?=$dirdata['ID']?>'
                                    class="btn btn-danger form-control">De baja</a>
                            </td>
                        </tr>
                    </form>
                    <?php endforeach; ?>
                </tbody>
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
                        <th data-sortable="true">Año Gestión</th>
                        <th>Editar</th>
                        <th>De Baja</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listarGestiones as $ciudades): ?>
                    <tr>
                        <td><input
                                id="insertarGestiones<?=$ciudades['ID']?>"
                                value="<?=$ciudades['NOMBRE']?>"
                                class="form-control" type="text" disabled></input>
                        </td>
                        <td><button class="btn btn-warning form-control"
                                id="editGestion(<?=$ciudades['ID']?>)">Editar</button>
                        </td>
                        <td><button class="btn btn-danger form-control"
                                id="elimGestion(<?=$ciudades['ID']?>)">Dar
                                de
                                baja</button></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div id="MIS_CIUDADES" class="col-md-4">
            <table id="tblCiudad" class="table table-hover table-bordered table-dark" data-toggle="table"
                data-pagination="true" data-search="true">
                <thead class='thead-dark'>
                    <tr>
                        <th data-sortable="true">Nombre Ciudad</th>
                        <th>Editar</th>
                        <th>De Baja</th>
                    </tr>

                </thead>
                <tbody>
                    <?php foreach ($listarCiudades as $ciudades): ?>
                    <tr>
                        <td><input
                                id="insertarCiudades<?=$ciudades['ID']?>"
                                value="<?=$ciudades['NOMBRE']?>"
                                class="form-control" type="text" disabled></input>
                        </td>
                        <td><button class="btn btn-warning form-control"
                                id="editCiudad(<?=$ciudades['ID']?>)">Editar</button>
                        </td>
                        <td><button class="btn btn-danger form-control"
                                id="elimCiudad(<?=$ciudades['ID']?>)">Dar
                                de
                                baja</button></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div id="MIS_FACULTADES" class="col-md-4">
            <table id="tblFacultad" class="table table-hover table-bordered table-dark" data-toggle="table"
                data-pagination="true" data-search="true">
                <thead class='thead-dark'>
                    <tr>
                        <th data-sortable="true">Nombre Facultad</th>
                        <th>Editar</th>
                        <th>De Baja</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listarFacultades as $ciudades): ?>
                    <tr>
                        <td><input
                                id="insertarFacultades<?=$ciudades['ID']?>"
                                value="<?=$ciudades['NOMBRE']?>"
                                class="form-control" type="text" disabled></input>
                        </td>
                        <td><button class="btn btn-warning form-control"
                                id="editFacultad(<?=$ciudades['ID']?>)">Editar</button>
                        </td>
                        <td><button class="btn btn-danger form-control"
                                id="elimFacultad(<?=$ciudades['ID']?>)">Dar
                                de
                                baja</button></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
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
                        <th data-sortable="true">Nombre Carrera</th>
                        <th>Editar</th>
                        <th>De Baja</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listarCarreras as $ciudades): ?>
                    <tr>
                        <td><input
                                id="insertarCarreras<?=$ciudades['ID']?>"
                                value="<?=$ciudades['NOMBRE']?>"
                                class="form-control" type="text" disabled></input>
                        </td>
                        <td><button class="btn btn-warning form-control"
                                id="editCarrera(<?=$ciudades['ID']?>)">Editar</button>
                        </td>
                        <td><button class="btn btn-danger form-control"
                                id="elimCarrera(<?=$ciudades['ID']?>)">Dar
                                de
                                baja</button></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div id="MIS_SEMESTRES" class="col-md-4">
            <table id="tblSemestre" class="table table-hover table-bordered table-dark" data-toggle="table"
                data-pagination="true" data-search="true">
                <thead class='thead-dark'>
                    <tr>
                        <th data-sortable="true">Nombre Semestre</th>
                        <th>Editar</th>
                        <th>De Baja</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listarSemestres as $ciudades): ?>
                    <tr>
                        <td><input
                                id="insertarSemestres<?=$ciudades['ID']?>"
                                value="<?=$ciudades['NOMBRE']?>"
                                class="form-control" type="text" disabled></input>
                        </td>
                        <td><button class="btn btn-warning form-control"
                                id="editSemestre(<?=$ciudades['ID']?>)">Editar</button>
                        </td>
                        <td><button class="btn btn-danger form-control"
                                id="elimSemestre(<?=$ciudades['ID']?>)">Dar
                                de
                                baja</button></td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <div id="MIS_MATERIAS" class="col-md-4">
            <table id="tblMateria" class="table table-hover table-bordered table-dark" data-toggle="table"
                data-pagination="true" data-search="true" >
                <thead class='thead-dark'>
                    <tr>
                        <th data-sortable="true">Nombre Materia</th>
                        <th>Editar</th>
                        <th>De Baja</th>
                    </tr>
                </thead>
                <tbody class="list">
                    <?php foreach ($listarMaterias as $ciudades): ?>
                    <tr>
                        <td><input
                                id="insertarMaterias<?=$ciudades['ID']?>"
                                value="<?=$ciudades['NOMBRE']?>"
                                class="form-control" type="text" disabled></input>
                        </td>
                        <td><button class="btn btn-warning form-control"
                                id="editMateria(<?=$ciudades['ID']?>)">Editar</button>
                        </td>
                        <td><button class="btn btn-danger form-control"
                                id="elimMateria(<?=$ciudades['ID']?>)">Dar
                                de
                                baja</button></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type='text/javascript' src='assets/js/admDirectorio.js'>
</script>
<script>
    $(document).ready(bootTablas());

    function bootTablas() {
        $('#tblMateria').bootstrapTable();
        $('#tblSemestre').bootstrapTable();
        $('#tblCarrera').bootstrapTable();
        $('#tblFacultad').bootstrapTable();
        $('#tblCiudad').bootstrapTable();
        $('#tblGestion').bootstrapTable();
        $('#tblDirectorios').bootstrapTable();
    }
</script>