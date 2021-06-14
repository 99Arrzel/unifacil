<?php if (session()->get('nivel') != 1) {
    header('Location: http://proyecto3.tk/');
}?>

<body>
    <div class="container">
        <h1>ABM Ciudad</h1>
        <div class="row">
            <div class="col-sm-12">
                <form
                    action="<?php echo base_url() . '/crear'?>"
                    method="POST">
                    <label>Nombre</label>
                    <input type="text" name="nombreCiudad" id="nombreCiudad" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
        <?php /*if (session()->get('exitoso')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->get('exitoso')
        </div> */?>

        <?php // endif;?>
        <br>
        <h2>Listado de Ciudades</h2>
        <?php //print_r($datos);?>
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>Ciudad</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                        <?php foreach ($datos as $key): ?>
                        <tr>
                            <td><?php echo $key->nombreCiudad ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url() . '/obtenerNombre/' . $key->idtblCiudad //basicamente obtiene el id para poder hace el update?>"
                                    class="btn btn-warning btn-small">Editar</a>
                            </td>
                            <td>
                                <a href="<?php echo base_url() . '/eliminar/' . $key->idtblCiudad ?>"
                                    class="btn btn-danger btn-small">Eliminar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
        //sweet alert para que se vea mas bonito
    </script>

    <script type="text/javascript">
        //muestra un alert si todo va bien
        let mensaje = "<?php echo $mensaje ?>";
        if (mensaje == '1') {
            swal('😎', 'Agregado con exito', 'success'); //alert("Agregado con exito");
        } else if (mensaje == '0') {
            swal('😑 ', 'Error en la insercion', 'error'); //alert("No se agrego, error en la insercion");    
        } else if (mensaje == '2') {
            swal('😀', 'Actualizado con exito', 'success');
        } else if (mensaje == '3') {
            swal('😧 ', 'Error al actualizar', 'error');
        } else if (mensaje == '4') {
            swal('😈', 'Eliminado con exito', 'success');
        } else if (mensaje == '5') {
            swal('🤡', 'Error al eliminar', 'error');
        }
    </script>
</body>