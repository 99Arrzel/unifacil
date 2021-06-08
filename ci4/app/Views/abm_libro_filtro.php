
    <?php if (session()->get('nivel') > 2) 
        {
            header('Location: http://proyecto3.tk/');
        }?>
<body>
    <div class="container">
        <h1>ABM Libro</h1>
        <div class="row">
            <div class="col-sm-12">
                <form action="<?php echo base_url().'/crearLibro'?>" method="POST">
                    <label>Libro</label>
                    <input type="text" name="nombreLibro" id="nombreLibro" class="form-control">
                    <label>Año</label>
                    <input type="text" name="year" id="year" class="form-control">
                    <label>Edicion</label>
                    <input type="text" name="edicion" id="edicion" class="form-control">
                    <label>Direccion</label>
                    <input type="text" name="dirDoc" id="dirDoc" class="form-control">
                    <!--<label>Estado</label> -->
                    <input type="text" name="estado" id="estado" class="form-control" hidden="" value ="0">
                    <label>Imagen</label> <br>
                    <select name="tblImagen_idtblImagen" id="tblImagen_idtblImagen" class="form-control">
                        <option selected>seleccione una imagen</option>
                        <?php foreach ($imagen as $imagenData): ?>
                        <option value="<?= $imagenData['IDimagen']?>"><?=$imagenData['nombreImagen'];?></option>
                        <?php endforeach; ?>
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
        <h2>Listado de Libros</h2>
        <?php //print_r($libro);?>
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered table-dark">
                        <tr>
                            <th>Libro</th>
                            <th>Año</th>
                            <th>Edicion</th>
                            <th>Direccion</th>
                            <th>Imagen</th>
                            <th>Editar</th>
                           <!-- <th>Eliminar</th> -->
                        </tr>
                        
                        <tr>
                        <?php foreach ($libro as $key): ?>
                            <?php if(($key->estado)==0): ?>
                            <td><?php echo $key->nombreLibro ?> </td>
                            <td><?php echo $key->year ?> </td>
                            <td><?php echo $key->edicion ?> </td>
                            <td><a href="<?php echo $key->dirDoc ?>">Enlace</a></td>
                            <td><?php echo $key->nombreImagen ?></td>
                            <td>
                                <a href="<?php echo base_url().'/obtenerNombreLibro/'.$key->idtblLibro.'/'.$key->idtblImagen?>"
                                    class="btn btn-warning btn-small">Editar</a>
                            </td>
                           <!-- <td>
                                <a href="<?php //echo base_url().'/eliminarLibroLogic/'.$key->idtblLibro?>" class="btn btn-danger btn-small">Eliminar</a>
                            </td> -->
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>

        <h2>Listado de Libros eliminados</h2>                        
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered table-dark">
                        <tr>
                            <th>Libro</th>
                            <th>Año</th>
                            <th>Edicion</th>
                            <th>Direccion</th>
                            <th>Imagen</th>
                            <th>Editar</th>
                        </tr>
                        
                        <tr>
                        <?php foreach ($libro as $key): ?>
                            <?php if(($key->estado)==1): ?>
                            <td><?php echo $key->nombreLibro ?> </td>
                            <td><?php echo $key->year ?> </td>
                            <td><?php echo $key->edicion ?> </td>
                            <td><a href="<?php echo $key->dirDoc ?>">Enlace</a></td>
                            <td><?php echo $key->nombreImagen ?></td>
                            <td>
                                <a href="<?php echo base_url().'/obtenerNombreLibro/'.$key->idtblLibro.'/'.$key->idtblImagen?>"
                                    class="btn btn-warning btn-small">Editar</a>
                            </td>
                           <!-- <td>
                                <a href="<?php echo base_url().'/eliminarLibroLogic/'.$key->idtblLibro?>" class="btn btn-success btn-small">Restaurar</a>
                            </td> -->
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>                        

    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">//sweet alert para que se vea mas bonito</script>
    
    <script type="text/javascript"> //muestra un alert si todo va bien
        let mensaje = "<?php echo $mensaje ?>";
        if(mensaje == '0' )
        {
            swal('😎','Agregado con exito','success');    //alert("Agregado con exito");
        }
        else if (mensaje == '1') 
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