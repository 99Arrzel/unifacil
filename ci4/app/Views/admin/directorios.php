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
                        <form autocomplete="off">
                            <tbody>
                                <tr>
                                    <td><input id="nombreModal" autocomplete="off" type='text' name='nombre'
                                            class='form-control'></input></td>
                                    <td><button id="btnModal" name="btnModal" value="" type='button'
                                            class='btn btn-success form-control'>Enviar
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
    <div class="row">
        <div class="col-md-12">
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
                </div>
            </div>
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
<script>
/*var esp =  {
                "decimal": "",
                "emptyTable": "No hay datos",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(Filtro de _MAX_ total registros)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron coincidencias",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar orden de columna ascendente",
                    "sortDescending": ": Activar orden de columna desendente"
                }
            };*/
var mitab = {}; //Global

    $(document).ready(function(){
        //==Directorio abajo
        document.title = "Lista de directorios UNIFRANZ";
        const ajaxDirectorio = "https://proyecto3.tk/adm-dir/ajaxListDirectorio";
        const ajaxGestion = "https://proyecto3.tk/adm-dir/ajaxListGestion";
        const ajaxCiudades = "https://proyecto3.tk/adm-dir/ajaxListCiudad";
        const ajaxFacultad = "https://proyecto3.tk/adm-dir/ajaxListFacultad";
        const ajaxCarrera = "https://proyecto3.tk/adm-dir/ajaxListCarrera";
        const ajaxSemestre= "https://proyecto3.tk/adm-dir/ajaxListSemestre";
        const ajaxMateria = "https://proyecto3.tk/adm-dir/ajaxListMateria";
        mitab.tablaBaja = $('#tblDirectorios').DataTable({
            ajax: {
                url: ajaxDirectorio,
                dataSrc: "",
            },
            dom: 'B<lf>rtip',
            buttons: [{
                    extend: 'copy',
                    text: 'Copiar',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                    },
                    className: 'btn btn-info',
                },
                {
                    extend: 'csv',
                    text: 'CSV',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                    },
                    className: 'btn btn-info',
                },
                {
                    extend: 'excel',
                    text: 'EXCEL',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                    },
                    className: 'btn btn-info',
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                    },
                    className: 'btn btn-info',
                },
                {
                    extend: 'print',
                    text: 'Imprimir',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                    },
                    className: 'btn btn-info',
                },
            ],
            columns:[
                {
                    data: 'CIUDAD',
                },
                {
                    data: 'GESTION',
                },
                {
                    data: 'FACULTAD',
                },
                {
                    data: 'CARRERA',
                },
                {
                    data: 'SEMESTRE',
                },
                {
                    data: 'MATERIA',
                },
                {
                    data: 'ID',
                    orderable: false,
                    render: function(data) {
                        return "<button onclick='ops.re(" + data +
                            ")' class='btn btn-danger form-control'>Dar de baja</button>";
                    },
                },
            ],
            language: {
                "decimal": "",
                "emptyTable": "No hay datos",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(Filtro de _MAX_ total registros)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron coincidencias",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar orden de columna ascendente",
                    "sortDescending": ": Activar orden de columna desendente"
                }
            },
        });
        //==Ciudad abajo

        mitab.tablaBaja = $('#tblGestion').DataTable({
            ajax: {
                url: ajaxGestion,
                dataSrc: "",
            },
            dom: 'B<lf>rtip',
            buttons: [{
                    extend: 'copy',
                    text: 'Copiar',
                    exportOptions: {
                        columns: [0],
                    },
                    className: 'btn btn-info',
                },
                {
                    extend: 'csv',
                    text: 'CSV',
                    exportOptions: {
                        columns: [0],
                    },
                    className: 'btn btn-info',
                },
                {
                    extend: 'excel',
                    text: 'EXCEL',
                    exportOptions: {
                        columns: [0],
                    },
                    className: 'btn btn-info',
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    exportOptions: {
                        columns: [0],
                    },
                    className: 'btn btn-info',
                },
                {
                    extend: 'print',
                    text: 'Imprimir',
                    exportOptions: {
                        columns: [0],
                    },
                    className: 'btn btn-info',
                },
            ],
            columns:[
                {
                    data: 'NOMBRE',
                },
                {
                    data: 'ID',
                    orderable: false,
                    render: function(data) {
                        return "<button onclick='ops.gesEdi(" + data +
                            ")' class='btn btn-warning form-control'>Dar de baja</button>";
                    },
                },
                {
                    data: 'ID',
                    orderable: false,
                    render: function(data) {
                        return "<button onclick='ops.gesEli(" + data +
                            ")' class='btn btn-danger form-control'>Dar de baja</button>";
                    },
                },
            ],
            language: {
                "decimal": "",
                "emptyTable": "No hay datos",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(Filtro de _MAX_ total registros)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron coincidencias",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar orden de columna ascendente",
                    "sortDescending": ": Activar orden de columna desendente"
                }
            },
        });


    });

</script>