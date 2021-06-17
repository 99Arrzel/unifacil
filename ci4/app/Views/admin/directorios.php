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
    <button id='botonOcultarDir' type='button' onclick='mostrarDir()' class='btn btn-primary'>Mostrar de baja</button>
    <div class="row">
        <div class="col-md-12" id = "listaDeAltaDir">
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
        <div class="col-md-12" id = "listaDeBajaDir">
            <div class='table table-bordered bg-dark text-light'>
                <div class="table-responsive">
                    <table class="table table-hover" id="tblDirectoriosBaja" hidden>
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
</div>
</div>
<script>
var esp = {
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
};
var mitab = {}; //Global
const hoy = new Date();
const options = {
    weekday: 'long',
    year: 'numeric',
    month: 'long',
    day: 'numeric'
};
const impFecha = hoy.toLocaleDateString('es-ES', options);
$(document).ready(function() {
    //==Directorio abajo
    document.title = "Lista de directorios UNIFRANZ";
    const ajaxDirectorio = "https://proyecto3.tk/adm-dir/ajaxListDirectorio";
    const ajaxDirectorioBaja = "https://proyecto3.tk/adm-dir/ajaxListDirectorioBaja";
    const ajaxGestion = "https://proyecto3.tk/adm-dir/ajaxListGestion";
    const ajaxCiudad = "https://proyecto3.tk/adm-dir/ajaxListCiudad";
    const ajaxFacultad = "https://proyecto3.tk/adm-dir/ajaxListFacultad";
    const ajaxCarrera = "https://proyecto3.tk/adm-dir/ajaxListCarrera";
    const ajaxSemestre = "https://proyecto3.tk/adm-dir/ajaxListSemestre";
    const ajaxMateria = "https://proyecto3.tk/adm-dir/ajaxListMateria";
    mitab.tablaDirBaja = $('#tblDirectoriosBaja').DataTable({
        ajax: {
            url: ajaxDirectorioBaja,
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
                filename: "Reporte Directorios de baja -" + impFecha,
                messageTop: "Reporte Directorios de baja -" + impFecha,
            },
            {
                extend: 'csv',
                text: 'CSV',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                },
                className: 'btn btn-info',
                filename: "Reporte Directorios de alta -" + impFecha,
                messageTop: "Reporte Directorios de alta -" + impFecha,
            },
            {
                extend: 'excel',
                text: 'EXCEL',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                },
                className: 'btn btn-info',
                filename: "Reporte Directorios de alta -" + impFecha,
                messageTop: "Reporte Directorios de alta -" + impFecha,
            },
            {
                extend: 'pdf',
                text: 'PDF',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                },
                className: 'btn btn-info',
                filename: "Reporte Directorios de alta -" + impFecha,
                messageTop: "Reporte Directorios de alta -" + impFecha,
            },
            {
                extend: 'print',
                text: 'Imprimir',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                },
                className: 'btn btn-info',
                filename: "Reporte Directorios de alta -" + impFecha,
                messageTop: "Reporte Directorios de alta -" + impFecha,
            },
        ],
        columns: [{
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
                    return "<button onclick='dirBaja(" + data +
                        ")' class='btn btn-success form-control'>Dar de alta</button>";
                },
            },
        ],
        language: esp,
    });

    mitab.tablaDir = $('#tblDirectorios').DataTable({
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
                filename: "Reporte Directorios de alta -" + impFecha,
                messageTop: "Reporte Directorios de alta -" + impFecha,
            },
            {
                extend: 'csv',
                text: 'CSV',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                },
                className: 'btn btn-info',
                filename: "Reporte Directorios de alta -" + impFecha,
                messageTop: "Reporte Directorios de alta -" + impFecha,
            },
            {
                extend: 'excel',
                text: 'EXCEL',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                },
                className: 'btn btn-info',
                filename: "Reporte Directorios de alta -" + impFecha,
                messageTop: "Reporte Directorios de alta -" + impFecha,
            },
            {
                extend: 'pdf',
                text: 'PDF',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                },
                className: 'btn btn-info',
                filename: "Reporte Directorios de alta -" + impFecha,
                messageTop: "Reporte Directorios de alta -" + impFecha,
            },
            {
                extend: 'print',
                text: 'Imprimir',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                },
                className: 'btn btn-info',
                filename: "Reporte Directorios de alta -" + impFecha,
                messageTop: "Reporte Directorios de alta -" + impFecha,
            },
        ],
        columns: [{
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
                    return "<button onclick='dirBaja(" + data +
                        ")' class='btn btn-danger form-control'>Dar de baja</button>";
                },
            },
        ],
        language: esp,
    });
    //==Gestion abajo
    mitab.tablaGestion = $('#tblGestion').DataTable({
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
                filename: "Reporte Gestiones de alta -" + impFecha,
                messageTop: "Reporte Gestiones de alta -" + impFecha,
            },
            {
                extend: 'csv',
                text: 'CSV',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Gestiones de alta -" + impFecha,
                messageTop: "Reporte Gestiones de alta -" + impFecha,
            },
            {
                extend: 'excel',
                text: 'EXCEL',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Gestiones de alta -" + impFecha,
                messageTop: "Reporte Gestiones de alta -" + impFecha,
            },
            {
                extend: 'pdf',
                text: 'PDF',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Gestiones de alta -" + impFecha,
                messageTop: "Reporte Gestiones de alta -" + impFecha,
            },
            {
                extend: 'print',
                text: 'Imprimir',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Gestiones de alta -" + impFecha,
                messageTop: "Reporte Gestiones de alta -" + impFecha,
            },
        ],
        columns: [{
                data: 'NOMBRE',
            },
            {
                data: 'ID',
                orderable: false,
                render: function(data) {
                    return "<button onclick='gesEdi(" + data +
                        ")' class='btn btn-warning form-control'>Editar</button>";
                },
            },
            {
                data: 'ID',
                orderable: false,
                render: function(data) {
                    return "<button onclick='gesEli(" + data +
                        ")' class='btn btn-danger form-control'>Dar de baja</button>";
                },
            },
        ],
        language: esp,
    });
    //Ciudad abajo
    mitab.tablaCiudad = $('#tblCiudad').DataTable({
        ajax: {
            url: ajaxCiudad,
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
                filename: "Reporte Ciudades de alta -" + impFecha,
                messageTop: "Reporte Ciudades de alta -" + impFecha,
            },
            {
                extend: 'csv',
                text: 'CSV',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Ciudades de alta -" + impFecha,
                messageTop: "Reporte Ciudades de alta -" + impFecha,
            },
            {
                extend: 'excel',
                text: 'EXCEL',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Ciudades de alta -" + impFecha,
                messageTop: "Reporte Ciudades de alta -" + impFecha,
            },
            {
                extend: 'pdf',
                text: 'PDF',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Ciudades de alta -" + impFecha,
                messageTop: "Reporte Ciudades de alta -" + impFecha,
            },
            {
                extend: 'print',
                text: 'Imprimir',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Ciudades de alta -" + impFecha,
                messageTop: "Reporte Ciudades de alta -" + impFecha,
            },
        ],
        columns: [{
                data: 'NOMBRE',
            },
            {
                data: 'ID',
                orderable: false,
                render: function(data) {
                    return "<button onclick='ciuEdi(" + data +
                        ")' class='btn btn-warning form-control'>Editar</button>";
                },
            },
            {
                data: 'ID',
                orderable: false,
                render: function(data) {
                    return "<button onclick='ciuEli(" + data +
                        ")' class='btn btn-danger form-control'>Dar de baja</button>";
                },
            },
        ],
        language: esp,
    });
    //facultad abajo
    mitab.tablaFacultad = $('#tblFacultad').DataTable({
        ajax: {
            url: ajaxFacultad,
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
                filename: "Reporte Facultades de alta -" + impFecha,
                messageTop: "Reporte Facultades de alta -" + impFecha,
            },
            {
                extend: 'csv',
                text: 'CSV',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Facultades de alta -" + impFecha,
                messageTop: "Reporte Facultades de alta -" + impFecha,
            },
            {
                extend: 'excel',
                text: 'EXCEL',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Facultades de alta -" + impFecha,
                messageTop: "Reporte Facultades de alta -" + impFecha,
            },
            {
                extend: 'pdf',
                text: 'PDF',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Facultades de alta -" + impFecha,
                messageTop: "Reporte Facultades de alta -" + impFecha,
            },
            {
                extend: 'print',
                text: 'Imprimir',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Facultades de alta -" + impFecha,
                messageTop: "Reporte Facultades de alta -" + impFecha,
            },
        ],
        columns: [{
                data: 'NOMBRE',
            },
            {
                data: 'ID',
                orderable: false,
                render: function(data) {
                    return "<button onclick='facEdi(" + data +
                        ")' class='btn btn-warning form-control'>Editar</button>";
                },
            },
            {
                data: 'ID',
                orderable: false,
                render: function(data) {
                    return "<button onclick='facEli(" + data +
                        ")' class='btn btn-danger form-control'>Dar de baja</button>";
                },
            },
        ],
        language: esp,
    });
    //Carrera abajo
    mitab.tablaCarrera = $('#tblCarrera').DataTable({
        ajax: {
            url: ajaxCarrera,
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
                filename: "Reporte Carreras de alta -" + impFecha,
                messageTop: "Reporte Carreras de alta -" + impFecha,
            },
            {
                extend: 'csv',
                text: 'CSV',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Carreras de alta -" + impFecha,
                messageTop: "Reporte Carreras de alta -" + impFecha,
            },
            {
                extend: 'excel',
                text: 'EXCEL',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Carreras de alta -" + impFecha,
                messageTop: "Reporte Carreras de alta -" + impFecha,
            },
            {
                extend: 'pdf',
                text: 'PDF',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Carreras de alta -" + impFecha,
                messageTop: "Reporte Carreras de alta -" + impFecha,
            },
            {
                extend: 'print',
                text: 'Imprimir',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Carreras de alta -" + impFecha,
                messageTop: "Reporte Carreras de alta -" + impFecha,
            },
        ],
        columns: [{
                data: 'NOMBRE',
            },
            {
                data: 'ID',
                orderable: false,
                render: function(data) {
                    return "<button onclick='carEdi(" + data +
                        ")' class='btn btn-warning form-control'>Editar</button>";
                },
            },
            {
                data: 'ID',
                orderable: false,
                render: function(data) {
                    return "<button onclick='carEli(" + data +
                        ")' class='btn btn-danger form-control'>Dar de baja</button>";
                },
            },
        ],
        language: esp,
    });
    //Semestre abajo
    mitab.tablaSemestre = $('#tblSemestre').DataTable({
        ajax: {
            url: ajaxSemestre,
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
                filename: "Reporte Semestres de alta -" + impFecha,
                messageTop: "Reporte Semestres de alta -" + impFecha,
            },
            {
                extend: 'csv',
                text: 'CSV',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Semestres de alta -" + impFecha,
                messageTop: "Reporte Semestres de alta -" + impFecha,
            },
            {
                extend: 'excel',
                text: 'EXCEL',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Semestres de alta -" + impFecha,
                messageTop: "Reporte Semestres de alta -" + impFecha,
            },
            {
                extend: 'pdf',
                text: 'PDF',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Semestres de alta -" + impFecha,
                messageTop: "Reporte Semestres de alta -" + impFecha,
            },
            {
                extend: 'print',
                text: 'Imprimir',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Semestres de alta -" + impFecha,
                messageTop: "Reporte Semestres de alta -" + impFecha,
            },
        ],
        columns: [{
                data: 'NOMBRE',
            },
            {
                data: 'ID',
                orderable: false,
                render: function(data) {
                    return "<button onclick='semEdi(" + data +
                        ")' class='btn btn-warning form-control'>Editar</button>";
                },
            },
            {
                data: 'ID',
                orderable: false,
                render: function(data) {
                    return "<button onclick='semEli(" + data +
                        ")' class='btn btn-danger form-control'>Dar de baja</button>";
                },
            },
        ],
        language: esp,
    });
    //Materia abajo
    mitab.tablaMateria = $('#tblMateria').DataTable({
        ajax: {
            url: ajaxMateria,
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
                filename: "Reporte Materias de alta -" + impFecha,
                messageTop: "Reporte Materias de alta -" + impFecha,
            },
            {
                extend: 'csv',
                text: 'CSV',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Materias de alta -" + impFecha,
                messageTop: "Reporte Materias de alta -" + impFecha,
            },
            {
                extend: 'excel',
                text: 'EXCEL',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Materias de alta -" + impFecha,
                messageTop: "Reporte Materias de alta -" + impFecha,
            },
            {
                extend: 'pdf',
                text: 'PDF',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Materias de alta -" + impFecha,
                messageTop: "Reporte Materias de alta -" + impFecha,
            },
            {
                extend: 'print',
                text: 'Imprimir',
                exportOptions: {
                    columns: [0],
                },
                className: 'btn btn-info',
                filename: "Reporte Materias de alta -" + impFecha,
                messageTop: "Reporte Materias de alta -" + impFecha,
            },
        ],
        columns: [{
                data: 'NOMBRE',
            },
            {
                data: 'ID',
                orderable: false,
                render: function(data) {
                    return "<button onclick='matEdi(" + data +
                        ")' class='btn btn-warning form-control'>Editar</button>";
                },
            },
            {
                data: 'ID',
                orderable: false,
                render: function(data) {
                    return "<button onclick='matEli(" + data +
                        ")' class='btn btn-danger form-control'>Dar de baja</button>";
                },
            },
        ],
        language: esp,
    });
});
//Functions para insertar, borrar...
function insertarCiudad() {
    var formData = {
        nombre: document.getElementById("ciudad").value,
    };
    console.log(formData);
    $.ajax({
        type: "POST",
        url: "/adm-dir/insertarCiudad",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function() {
                alert("Error 500, chequea el script amiguito");
            }
        },
        success: document.getElementById("ciudad").value = "",
        encode: true,
    }).done(function(resultado) {
        mitab.tablaCiudad.ajax.reload();

    });
}

function insertarGestion() {
    var formData = {
        nombre: document.getElementById("gestion").value,
    };
    console.log(formData);
    $.ajax({
        type: "POST",
        url: "/adm-dir/insertarGestion",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function() {
                alert("Error 500, chequea el script amiguito");
            }
        },
        success: document.getElementById("gestion").value = "",
        encode: true,
    }).done(function(resultado) {
        mitab.tablaGestion.ajax.reload();

    });
}

function insertarFacultad() {
    var formData = {
        nombre: document.getElementById("facultad").value,
    };
    console.log(formData);
    $.ajax({
        type: "POST",
        url: "/adm-dir/insertarFacultad",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function() {
                alert("Error 500, chequea el script amiguito");
            }
        },
        success: document.getElementById("facultad").value = "",
        encode: true,
    }).done(function(resultado) {
        mitab.tablaFacultad.ajax.reload();

    });
}

function insertarCarrera() {
    var formData = {
        nombre: document.getElementById("carrera").value,
    };
    console.log(formData);
    $.ajax({
        type: "POST",
        url: "/adm-dir/insertarCarrera",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function() {
                alert("Error 500, chequea el script amiguito");
            }
        },
        success: document.getElementById("carrera").value = "",
        encode: true,
    }).done(function(resultado) {
        mitab.tablaCarrera.ajax.reload();

    });
}

function insertarSemestre() {
    var formData = {
        nombre: document.getElementById("semestre").value,
    };
    console.log(formData);
    $.ajax({
        type: "POST",
        url: "/adm-dir/insertarSemestre",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function() {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
        success: document.getElementById("semestre").value = "",
    }).done(function(resultado) {
        mitab.tablaSemestre.ajax.reload();

    });
}

function insertarMateria() {
    var formData = {
        nombre: document.getElementById("materia").value,
    };
    console.log(formData);
    $.ajax({
        type: "POST",
        url: "/adm-dir/insertarMateria",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function() {
                alert("Error 500, chequea el script amiguito");
            }
        },
        success: document.getElementById("materia").value = "",
        encode: true,
    }).done(function(resultado) {
        mitab.tablaMateria.ajax.reload();

    });
}
//Bajas abajo, no funciona dirbaja por alguna razón
function dirBaja(id) {
    var formData = {
        miid: id
    };
    $.ajax({
        type: "POST",
        url: "/adm-dir/bajaDirectorio",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function() {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
    }).done(function(resultado) {
        mitab.tablaDir.ajax.reload(); //Recargas la tabla después de eliminar
    });
}

function gesEli(id) {
    var formData = {
        miid: id
    };
    $.ajax({
        type: "POST",
        url: "/adm-dir/bajaGestion",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function() {
                alert("Error 500, chequea el script amiguito");
            }
        },

        encode: true,
    }).done(function(resultado) {
        mitab.tablaGestion.ajax.reload(); //Recargas la tabla después de eliminar
    })
}

function ciuEli(id) {
    var formData = {
        miid: id
    };
    $.ajax({
        type: "POST",
        url: "/adm-dir/bajaCiudad",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function() {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
    }).done(function(resultado) {
        mitab.tablaCiudad.ajax.reload(); //Recargas la tabla después de eliminar
    })
}

function facEli(id) {
    var formData = {
        miid: id
    };
    $.ajax({
        type: "POST",
        url: "/adm-dir/bajaFacultad",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function() {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
    }).done(function(resultado) {
        mitab.tablaFacultad.ajax.reload(); //Recargas la tabla después de eliminar
    })
}

function carEli(id) {
    var formData = {
        miid: id
    };
    $.ajax({
        type: "POST",
        url: "/adm-dir/bajaCarrera",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function() {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
    }).done(function(resultado) {
        mitab.tablaCarrera.ajax.reload(); //Recargas la tabla después de eliminar
    })
}

function semEli(id) {
    var formData = {
        miid: id
    };
    $.ajax({
        type: "POST",
        url: "/adm-dir/bajaSemestre",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function() {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
    }).done(function(resultado) {
        mitab.tablaSemestre.ajax.reload(); //Recargas la tabla después de eliminar
    })
}

function matEli(id) {
    var formData = {
        miid: id
    };
    $.ajax({
        type: "POST",
        url: "/adm-dir/bajaMateria",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function() {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
    }).done(function(resultado) {
        mitab.tablaMateria.ajax.reload(); //Recargas la tabla después de eliminar
    })
}

function mostrarDir() {
    if (document.getElementById("botonOcultarDir").innerHTML == "Mostrar de baja") {
        document.getElementById("botonOcultarDir").innerHTML = "Mostrar de alta";
        document.getElementById("botonOcultarDir").className = "btn btn-success";
        document.getElementById("listaDeAltaDir").hidden = true;
        document.getElementById("listaDeBajaDir").hidden = false;
        document.title = "Directorios de baja UNIFACIL";
    } else {
        document.getElementById("botonOcultarDir").innerHTML = "Mostrar de baja";
        document.getElementById("botonOcultarDir").className = "btn btn-primary";
        document.getElementById("listaDeAltaDir").hidden = false;
        document.getElementById("listaDeBajaDir").hidden = true;
        document.title = "Directorios de alta UNIFACIL";
    }
}
//Edit functions abajo
</script>