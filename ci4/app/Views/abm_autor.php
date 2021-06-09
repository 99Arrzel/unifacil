<?php if (session()->get('nivel') > 2)
        {
            header('Location: http://proyecto3.tk/');
        }?>

<div class="container">
<h3>Ahora debes agregar un autor o si ya esta en la lista, puedes continuar o poner desconocido</h3>
    <h1>ABM Autor</h1>
    <div class="row">
        <div class="col-sm-12">
            <form action="<?php echo base_url().'/crearAutor'?>" method="POST">
                <label>Autor</label>
                <input type="text" name="nombreAutor" id="nombreAutor" class="form-control">
                <select name="estado" id="estado" class="form-control" required>
                        <option selected>seleccione un estado</option>
                        <option value="0">Activo</option>
                        <option value="1">Inactivo</option>
                </select>
                <br>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
    <?php /*if (session()->get('exitoso')): ?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('exitoso') 
        </div> */?>

        <?php // endif; ?>
        <br>
        <h2>Listado de Autores</h2>
        <?php //print_r($datos);?>
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered table-dark">
                        <tr>
                            <th>Autor</th>
                            <th>Estado</th>
                            <th>Editar</th>
                        </tr>
                        <?php foreach ($datos as $key): ?>
                        <?php if(($key->estado)==0): ?>
                        <tr>
                            <td><?php echo $key->nombreAutor ?>
                            </td>
                            <td><?php echo $key->estado ?></td>
                            <td>
                                <a href="<?php echo base_url().'/obtenerNombreAutor/'.$key->idtblAutor //basicamente obtiene el id para poder hace el update?>"
                                    class="btn btn-warning btn-small">Editar</a>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>

        <h2>Listado de Autores Eliminados</h2>
        <?php //print_r($datos);?>
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered table-dark">
                        <tr>
                            <th>Autor</th>
                            <th>Estado</th>
                            <th>Editar</th>
                        </tr>
                        <?php foreach ($datos as $key): ?>
                            <?php if(($key->estado)==1): ?>
                        <tr>
                            <td><?php echo $key->nombreAutor ?>
                            </td>
                            <td><?php echo $key->estado ?></td>
                            <td>
                                <a href="<?php echo base_url().'/obtenerNombreAutor/'.$key->idtblAutor //basicamente obtiene el id para poder hace el update?>"
                                    class="btn btn-warning btn-small">Editar</a>
                            </td>
                        </tr>
                        <?php endif;?> 
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    <a class="btn btn-primary btn-lg btn-block" href="/tag" role="button">Continuar a Tags</a>


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