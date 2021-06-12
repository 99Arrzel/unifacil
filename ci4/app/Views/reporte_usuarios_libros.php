
    <?php if (session()->get('nivel') > 2) 
        {
            header('Location: http://proyecto3.tk/');
        }?>
<body>
    <div class="container">
        <h1>Reporte de Libros-Usuarios</h1>
        <?php //print_r($libro);?>
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Usuario</th><!-- ward:  $id= session()->get('idtblUsuario'); echo $id  -->
                            <th>Email</th>
                            <th>Fecha y Hora</th>
                            <th>Nombre del Libro</th>
                            <th>Enlace</th>
                        </tr>
                        <tr>
                        <?php foreach ($usuario as $key): ?>
                            <td><?php echo $key['nombreUsuario']?></td>
                            <td><?php echo $key['apellido']?></td>
                            <td><?php echo $key['login']?></td>
                            <td><?php echo $key['email']?></td>
                            <td><?php echo $key['fecha']?></td>
                            <td><?php echo $key['nombreLibro']?></td>
                            <td><a href="<?php echo $key['dirDoc']?>">Enlace</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>                     

    </div>
</body>