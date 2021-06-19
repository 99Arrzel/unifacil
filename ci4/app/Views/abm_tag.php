
        <?php if (session()->get('nivel') > 2) 
        {
            header('Location: http://proyecto3.tk/');
        }?>
<body>
<h3>Finalmente debes insertar un tag para seleccionar o si ya esta en la lista puedes omitir esta parte</h3>
    <div class="container">
        <h1>ABM Tag</h1>
        <div class="row">
            <div class="col-sm-12">
                <form action="<?php echo base_url().'/crearTag'?>" method="POST">
                    <label>Tag</label>
                    <input type="text" name="nombreTag" id="nombreTag" class="form-control" required pattern="([A-zÀ-ž\s]){2,}">
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
        <h2>Listado de Tags</h2>
        <?php //print_r($datos);?>
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered table-dark table-sm">
                        <tr>
                            <th>Tag</th>
                            <th>Estado</th>
                            <th>Editar</th>
                        </tr>
                        <?php foreach ($datos as $key): ?>
                        <?php if(($key->estado)==0): ?>
                        <tr>
                            <td><?php echo $key->nombreTag ?>
                            </td>
                            <td><?php echo $key->estado ?></td>
                            <td>
                                <a href="<?php echo base_url().'/obtenerNombreTag/'.$key->idtblTag //basicamente obtiene el id para poder hace el update?>"
                                    class="btn btn-warning btn-small">Editar</a>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>

        <h2>Listado de Tags Eliminados</h2>
        <?php //print_r($datos);?>
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered table-dark table-sm">
                        <tr>
                            <th>Tag</th>
                            <th>Estado</th>
                            <th>Editar</th>
                        </tr>
                        <?php foreach ($datos as $key): ?>
                        <?php if(($key->estado)==1): ?>
                        <tr>
                            <td><?php echo $key->nombreTag ?>
                            </td>
                            <td><?php echo $key->estado ?></td>
                            <td>
                                <a href="<?php echo base_url().'/obtenerNombreTag/'.$key->idtblTag //basicamente obtiene el id para poder hace el update?>"
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
    <a class="btn btn-primary btn-lg btn-block" href="/librofiltro" role="button">Continuar a Libros</a>
    <a class="btn btn-primary btn-lg btn-block" href="/examenfiltro" role="button">Continuar a Examenes</a>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
//change selectboxes to selectize mode to be searchable
   $("select").select2();
});

</script>
</body>