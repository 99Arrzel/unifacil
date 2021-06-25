<?php if (session()->get('nivel') > 2) {
    header('Location: http://proyecto3.tk/');
}?>

<body>
    <div class="container">
        <h1>Reporte de Libros-Usuarios</h1>
        <?php //print_r($libro);?>
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered table-dark" id="reporteusuariolibro">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Usuario</th><!-- ward:  $id= session()->get('idtblUsuario'); echo $id  -->
                            <th>Email</th>
                            <th>Fecha y Hora</th>
                            <th>Nombre del Libro</th>
                            <th>Enlace</th>
                        </tr>
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