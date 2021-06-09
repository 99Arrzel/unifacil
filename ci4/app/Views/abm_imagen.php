
    <?php if(session()->get('nivel') > 2)
        {
            header('Location: http://proyecto3.tk/');
        }?>
<body>
<h3>Bienvenido para insertar un libro primero debes insertar la portada</h3>
    <div class="container">
        <h1>ABM Imagen</h1>
        <div class="row">
            <div class="col-sm-12">
                <form action="<?php echo base_url().'/crearImagen'?>" method="POST">
                    <label>Imagen</label>
                    <input type="text" name="nombreImagen" id="nombreImagen" class="form-control" required>
                    <label>URL Imagen</label>
                    <input type="url" name="dirImagen" id="dirImagen" class="form-control" required>
                    <label>Estado</label>
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
        <h2>Listado de Imagenes</h2>
        <?php //print_r($datos);?>
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered table-dark">
                        <tr>
                            <th>Imagen</th>
                            <th>URL Imagen</th>
                            <th>Estado</th>
                            <th>Editar</th>
                        </tr>
                        <?php foreach ($datos as $key): ?>
                            <?php if(($key->estado)==0): ?>
                        <tr>
                            <td><?php echo $key->nombreImagen ?>
                            </td>
                            <td> <a href="<?php echo $key->dirImagen ?>">Enlace</a></td>
                            <td><?php echo $key->estado ?></td>
                            <td>
                                <a href="<?php echo base_url().'/obtenerNombreImagen/'.$key->idtblImagen //basicamente obtiene el id para poder hace el update?>"
                                    class="btn btn-warning btn-small">Editar</a>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>

        <h2>Listado de Imagenes Eliminadas</h2>
        <?php //print_r($datos);?>
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered table-dark">
                        <tr>
                            <th>Imagen</th>
                            <th>URL Imagen</th>
                            <th>Estado</th>
                            <th>Editar</th>
                        </tr>
                        <?php foreach ($datos as $key): ?>
                            <?php if(($key->estado)==1): ?>
                        <tr>
                            <td><?php echo $key->nombreImagen ?>
                            </td>
                            <td> <a href="<?php echo $key->dirImagen ?>">Enlace</a></td>
                            <td><?php echo $key->estado ?></td>
                            <td>
                                <a href="<?php echo base_url().'/obtenerNombreImagen/'.$key->idtblImagen //basicamente obtiene el id para poder hace el update?>"
                                    class="btn btn-warning btn-small">Editar</a>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>

    </div>

    

    <a class="btn btn-primary btn-lg btn-block" href="/autor" role="button">Continuar a Autores</a>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">//sweet alert para que se vea mas bonito</script>
    
    <script type="text/javascript"> //muestra un alert si todo va bien
        let mensaje = "<?php echo $mensaje ?>";
        if(mensaje == '1' )
        {
            swal('😎','Agregado con exito','success');    //alert("Agregado con exito");
        }
        else if (mensaje == '0') 
        {
            swal('😑 ','Error en la insercion hay algo mal con la PK','error'); //alert("No se agrego, error en la insercion");    
        }
        else if (mensaje == '2') 
        {
            swal('😀','Actualizado con exito','success');    
        }
        else if (mensaje == '3') 
        {
            swal('😧 ','Error al actualizar','error');  
        }
        else if (mensaje == '4') 
        {
            swal('😈','Eliminado con exito','success');    
        }
        else if (mensaje == '5') 
        {
            swal('🤡','Error al eliminar','error');  
        }

    </script>
</body>