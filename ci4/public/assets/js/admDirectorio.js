/*jshint esversion: 6 */

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
$(document).ready(function () {
    //==Directorio abajo
    document.title = "Lista de directorios UNIFRANZ";
    const ajaxDirectorio = "https://proyecto3.tk/adm-dir/ajaxListDirectorio";
    const ajaxDirectorioBaja = "https://proyecto3.tk/adm-dir/ajaxListDirectorioBaja";
    const ajaxGestion = "https://proyecto3.tk/adm-dir/ajaxListGestion";
    const ajaxGestionBaja = "https://proyecto3.tk/adm-dir/ajaxListGestionBaja";
    const ajaxCiudad = "https://proyecto3.tk/adm-dir/ajaxListCiudad";
    const ajaxCiudadBaja = "https://proyecto3.tk/adm-dir/ajaxListCiudadBaja";
    const ajaxFacultad = "https://proyecto3.tk/adm-dir/ajaxListFacultad";
    const ajaxFacultadBaja = "https://proyecto3.tk/adm-dir/ajaxListFacultadBaja";
    const ajaxCarrera = "https://proyecto3.tk/adm-dir/ajaxListCarrera";
    const ajaxCarreraBaja = "https://proyecto3.tk/adm-dir/ajaxListCarreraBaja";
    const ajaxSemestre = "https://proyecto3.tk/adm-dir/ajaxListSemestre";
    const ajaxSemestreBaja = "https://proyecto3.tk/adm-dir/ajaxListSemestreBaja";
    const ajaxMateria = "https://proyecto3.tk/adm-dir/ajaxListMateria";
    const ajaxMateriaBaja = "https://proyecto3.tk/adm-dir/ajaxListMateriaBaja";
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
                render: function (data) {
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
                render: function (data) {
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
                render: function (data) {
                    return "<button onclick='gesEdi(" + data +
                        ")' class='btn btn-warning form-control'>Editar</button>";
                },
            },
            {
                data: 'ID',
                orderable: false,
                render: function (data) {
                    return "<button onclick='gesEli(" + data +
                        ")' class='btn btn-danger form-control'>Dar de baja</button>";
                },
            },
        ],
        language: esp,
    });
    mitab.tablaGestionBaja = $('#tblGestionBaja').DataTable({
        ajax: {
            url: ajaxGestionBaja,
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
                render: function (data) {
                    return "<button onclick='gesEdi(" + data +
                        ")' class='btn btn-warning form-control'>Editar</button>";
                },
            },
            {
                data: 'ID',
                orderable: false,
                render: function (data) {
                    return "<button onclick='gesEli(" + data +
                        ")' class='btn btn-success form-control'>Dar de Alta</button>";
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
                render: function (data) {
                    return "<button onclick='ciuEdi(" + data +
                        ")' class='btn btn-warning form-control'>Editar</button>";
                },
            },
            {
                data: 'ID',
                orderable: false,
                render: function (data) {
                    return "<button onclick='ciuEli(" + data +
                        ")' class='btn btn-danger form-control'>Dar de baja</button>";
                },
            },
        ],
        language: esp,
    });

    mitab.tablaCiudadBaja = $('#tblCiudadBaja').DataTable({
        ajax: {
            url: ajaxCiudadBaja,
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
                render: function (data) {
                    return "<button onclick='ciuEdi(" + data +
                        ")' class='btn btn-warning form-control'>Editar</button>";
                },
            },
            {
                data: 'ID',
                orderable: false,
                render: function (data) {
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
                render: function (data) {
                    return "<button onclick='facEdi(" + data +
                        ")' class='btn btn-warning form-control'>Editar</button>";
                },
            },
            {
                data: 'ID',
                orderable: false,
                render: function (data) {
                    return "<button onclick='facEli(" + data +
                        ")' class='btn btn-danger form-control'>Dar de baja</button>";
                },
            },
        ],
        language: esp,
    });
    mitab.tablaFacultadBaja = $('#tblFacultadBaja').DataTable({
        ajax: {
            url: ajaxFacultadBaja,
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
                render: function (data) {
                    return "<button onclick='facEdi(" + data +
                        ")' class='btn btn-warning form-control'>Editar</button>";
                },
            },
            {
                data: 'ID',
                orderable: false,
                render: function (data) {
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
                render: function (data) {
                    return "<button onclick='carEdi(" + data +
                        ")' class='btn btn-warning form-control'>Editar</button>";
                },
            },
            {
                data: 'ID',
                orderable: false,
                render: function (data) {
                    return "<button onclick='carEli(" + data +
                        ")' class='btn btn-danger form-control'>Dar de baja</button>";
                },
            },
        ],
        language: esp,
    });
    mitab.tablaCarreraBaja = $('#tblCarreraBaja').DataTable({
        ajax: {
            url: ajaxCarreraBaja,
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
                render: function (data) {
                    return "<button onclick='carEdi(" + data +
                        ")' class='btn btn-warning form-control'>Editar</button>";
                },
            },
            {
                data: 'ID',
                orderable: false,
                render: function (data) {
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
                render: function (data) {
                    return "<button onclick='semEdi(" + data +
                        ")' class='btn btn-warning form-control'>Editar</button>";
                },
            },
            {
                data: 'ID',
                orderable: false,
                render: function (data) {
                    return "<button onclick='semEli(" + data +
                        ")' class='btn btn-danger form-control'>Dar de baja</button>";
                },
            },
        ],
        language: esp,
    });
    mitab.tablaSemestreBaja = $('#tblSemestreBaja').DataTable({
        ajax: {
            url: ajaxSemestreBaja,
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
                render: function (data) {
                    return "<button onclick='semEdi(" + data +
                        ")' class='btn btn-warning form-control'>Editar</button>";
                },
            },
            {
                data: 'ID',
                orderable: false,
                render: function (data) {
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
                render: function (data) {
                    return "<button onclick='matEdi(" + data +
                        ")' class='btn btn-warning form-control'>Editar</button>";
                },
            },
            {
                data: 'ID',
                orderable: false,
                render: function (data) {
                    return "<button onclick='matEli(" + data +
                        ")' class='btn btn-danger form-control'>Dar de baja</button>";
                },
            },
        ],
        language: esp,
    });
    mitab.tablaMateriaBaja = $('#tblMateriaBaja').DataTable({
        ajax: {
            url: ajaxMateriaBaja,
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
                render: function (data) {
                    return "<button onclick='matEdi(" + data +
                        ")' class='btn btn-warning form-control'>Editar</button>";
                },
            },
            {
                data: 'ID',
                orderable: false,
                render: function (data) {
                    return "<button onclick='matEli(" + data +
                        ")' class='btn btn-danger form-control'>Dar de baja</button>";
                },
            },
        ],
        language: esp,
    });
    //Timeouts
    setTimeout(function () {
        document.getElementById("listaDeBajaDir").hidden = true;
        document.getElementById("MIS_GESTIONESBAJA").hidden = true;
        document.getElementById("MIS_CIUDADESBAJA").hidden = true;
        document.getElementById("MIS_FACULTADESBAJA").hidden = true;
        document.getElementById("MIS_CARRERASBAJA").hidden = true;
        document.getElementById("MIS_SEMESTRESBAJA").hidden = true;
        document.getElementById("MIS_MATERIASBAJA").hidden = true;

    }, 200);
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
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        success: document.getElementById("ciudad").value = "",
        encode: true,
    }).done(function (resultado) {
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
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        success: document.getElementById("gestion").value = "",
        encode: true,
    }).done(function (resultado) {
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
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        success: document.getElementById("facultad").value = "",
        encode: true,
    }).done(function (resultado) {
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
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        success: document.getElementById("carrera").value = "",
        encode: true,
    }).done(function (resultado) {
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
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
        success: document.getElementById("semestre").value = "",
    }).done(function (resultado) {
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
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        success: document.getElementById("materia").value = "",
        encode: true,
    }).done(function (resultado) {
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
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
    }).done(function (resultado) {
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
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },

        encode: true,
    }).done(function (resultado) {
        mitab.tablaGestion.ajax.reload(); //Recargas la tabla después de eliminar
    });
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
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
    }).done(function (resultado) {
        mitab.tablaCiudad.ajax.reload(); //Recargas la tabla después de eliminar
    });
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
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
    }).done(function (resultado) {
        mitab.tablaFacultad.ajax.reload(); //Recargas la tabla después de eliminar
    });
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
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
    }).done(function (resultado) {
        mitab.tablaCarrera.ajax.reload(); //Recargas la tabla después de eliminar
    });
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
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
    }).done(function (resultado) {
        mitab.tablaSemestre.ajax.reload(); //Recargas la tabla después de eliminar
    });
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
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
    }).done(function (resultado) {
        mitab.tablaMateria.ajax.reload(); //Recargas la tabla después de eliminar
    });
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
function mostrarGes() {
    if (document.getElementById("botonOcultarGes").innerHTML == "Mostrar de baja") {
        document.getElementById("botonOcultarGes").innerHTML = "Mostrar de alta";
        document.getElementById("botonOcultarGes").className = "btn btn-success";
        document.getElementById("MIS_GESTIONES").hidden = true;
        document.getElementById("MIS_GESTIONESBAJA").hidden = false;
        document.title = "Gestiones de baja UNIFACIL";
    } else {
        document.getElementById("botonOcultarGes").innerHTML = "Mostrar de baja";
        document.getElementById("botonOcultarGes").className = "btn btn-primary";
        document.getElementById("MIS_GESTIONES").hidden = false;
        document.getElementById("MIS_GESTIONESBAJA").hidden = true;
        document.title = "Gestiones de alta UNIFACIL";
    }
}
function mostrarCiu() {
    if (document.getElementById("botonOcultarCiu").innerHTML == "Mostrar de baja") {
        document.getElementById("botonOcultarCiu").innerHTML = "Mostrar de alta";
        document.getElementById("botonOcultarCiu").className = "btn btn-success";
        document.getElementById("MIS_CIUDADES").hidden = true;
        document.getElementById("MIS_CIUDADESBAJA").hidden = false;
        document.title = "Ciudades de baja UNIFACIL";
    } else {
        document.getElementById("botonOcultarCiu").innerHTML = "Mostrar de baja";
        document.getElementById("botonOcultarCiu").className = "btn btn-primary";
        document.getElementById("MIS_CIUDADES").hidden = false;
        document.getElementById("MIS_CIUDADESBAJA").hidden = true;
        document.title = "Ciudades de alta UNIFACIL";
    }
}
function mostrarFac() {
    if (document.getElementById("botonOcultarFac").innerHTML == "Mostrar de baja") {
        document.getElementById("botonOcultarFac").innerHTML = "Mostrar de alta";
        document.getElementById("botonOcultarFac").className = "btn btn-success";
        document.getElementById("MIS_FACULTADES").hidden = true;
        document.getElementById("MIS_FACULTADESBAJA").hidden = false;
        document.title = "Facultades de baja UNIFACIL";
    } else {
        document.getElementById("botonOcultarFac").innerHTML = "Mostrar de baja";
        document.getElementById("botonOcultarFac").className = "btn btn-primary";
        document.getElementById("MIS_FACULTADES").hidden = false;
        document.getElementById("MIS_FACULTADESBAJA").hidden = true;
        document.title = "Facultades de alta UNIFACIL";
    }
}
function mostrarCar() {
    if (document.getElementById("botonOcultarCar").innerHTML == "Mostrar de baja") {
        document.getElementById("botonOcultarCar").innerHTML = "Mostrar de alta";
        document.getElementById("botonOcultarCar").className = "btn btn-success";
        document.getElementById("MIS_CARRERAS").hidden = true;
        document.getElementById("MIS_CARRERASBAJA").hidden = false;
        document.title = "Carreras de baja UNIFACIL";
    } else {
        document.getElementById("botonOcultarCar").innerHTML = "Mostrar de baja";
        document.getElementById("botonOcultarCar").className = "btn btn-primary";
        document.getElementById("MIS_CARRERAS").hidden = false;
        document.getElementById("MIS_CARRERASBAJA").hidden = true;
        document.title = "Carreras de alta UNIFACIL";
    }
}
function mostrarSem() {
    if (document.getElementById("botonOcultarSem").innerHTML == "Mostrar de baja") {
        document.getElementById("botonOcultarSem").innerHTML = "Mostrar de alta";
        document.getElementById("botonOcultarSem").className = "btn btn-success";
        document.getElementById("MIS_SEMESTRES").hidden = true;
        document.getElementById("MIS_SEMESTRESBAJA").hidden = false;
        document.title = "Semestres de baja UNIFACIL";
    } else {
        document.getElementById("botonOcultarSem").innerHTML = "Mostrar de baja";
        document.getElementById("botonOcultarSem").className = "btn btn-primary";
        document.getElementById("MIS_SEMESTRES").hidden = false;
        document.getElementById("MIS_SEMESTRESBAJA").hidden = true;
        document.title = "Semestres de alta UNIFACIL";
    }
}
function mostrarMat() {
    if (document.getElementById("botonOcultarMat").innerHTML == "Mostrar de baja") {
        document.getElementById("botonOcultarMat").innerHTML = "Mostrar de alta";
        document.getElementById("botonOcultarMat").className = "btn btn-success";
        document.getElementById("MIS_MATERIAS").hidden = true;
        document.getElementById("MIS_MATERIASBAJA").hidden = false;
        document.title = "Materias de baja UNIFACIL";
    } else {
        document.getElementById("botonOcultarMat").innerHTML = "Mostrar de baja";
        document.getElementById("botonOcultarMat").className = "btn btn-primary";
        document.getElementById("MIS_MATERIAS").hidden = false;
        document.getElementById("MIS_MATERIASBAJA").hidden = true;
        document.title = "Materias de alta UNIFACIL";
    }
}
//Edit functions abajo 
/* 
document.getElementById("listaDeBajaDir").hidden = true;
        document.getElementById("MIS_GESTIONESBAJA").hidden = true;
        document.getElementById("MIS_CIUDADESBAJA").hidden = true;
        document.getElementById("MIS_FACULTADESBAJA").hidden = true;
        document.getElementById("MIS_CARRERASBAJA").hidden = true;
        document.getElementById("MIS_SEMESTRESBAJA").hidden = true;
        document.getElementById("MIS_MATERIASBAJA").hidden = true;*/