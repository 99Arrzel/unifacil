<?php if (session()->get('nivel') > 2) {
    header('Location: http://proyecto3.tk/');
}?>
<body>
    <div class="container">
        <h1>Reporte de Libros-Usuarios</h1>
        <?php //print_r($libro);?>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover table-bordered table-dark" id="reporteusuariolibro">
                    <div class="table table-responsive">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Usuario</th>
                                <th>Email</th>
                                <th>Fecha y Hora</th>
                                <th>Nombre del Libro</th>
                                <th>Enlace</th>
                            </tr>
                        </thead>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>
<script type="text/javascript">
    var datos = <?php echo json_encode($usuario); ?> ;
    var tabla_reporte = $('#reporteusuariolibro').DataTable({
        data: datos,
        dom: 'B<lf>rtip', //Magico y sencillazango
        buttons: [{
                extend: 'copyHtml5',
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
        columns: [{
                data: 'nombreUsuario'
            },
            {
                data: 'apellido'
            },
            {
                data: 'login'
            },
            {
                data: 'email'
            },
            {
                data: 'fecha'
            },
            {
                data: 'nombreLibro'
            },
            {
                data: 'dirdoc'
            },
        ],
        language: {
            "decimal": "",
            "emptyTable": "No hay datos",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 a 0 de 0 registros",
            "infoFiltered": "(Filtro de _MAX_ total registros)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ registros",
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
        }
    });
</script>