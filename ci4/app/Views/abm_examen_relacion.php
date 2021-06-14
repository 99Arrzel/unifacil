    <?php if (session()->get('nivel') > 2) {
        header('Location: http://proyecto3.tk/');
    } ?>

    <body>
        <div class="container">
            <h1>ABM ExamenRelacion</h1>
            <h3>Seleccione un tag y un examen para que sea asignado a dicho examen</h3>
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?php echo base_url() . '/crearTagRelacionExamen' ?>" method="POST">
                        <label>Examen</label>
                        <select name="idtblExamen" id="idtblExamen" class="form-control" required>
                            <option selected>Seleccione un Examen</option>
                            <?php foreach ($examen as $examenData) : ?>
                            <?php if(($examenData['estado'])==0): ?>
                                <option value="<?= $examenData['idtblExamen'] ?>"><?= $examenData['nombreExamen']; ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <label>Tag</label> <br>
                        <select name="IDTag" id="IDTag" class="form-control" required>
                            <option selected>Seleccione un Tag</option>
                            <?php foreach ($tag as $tagData) : ?>
                                <option value="<?= $tagData['IDTag'] ?>"><?= $tagData['nombreTag']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <br>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <h4>Para que un examen aparezca en la lista general, debe tener al menos 1 tag
        <br>Y para que aparezca en un directorio debe estar enlazdo al directorio enlazado<br></h4>
        <hr>
        <div class="container">
            <h3>Seleccione un directorio y un examen para que sea asignado a dicho directorio</h3>
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?php echo base_url() . '/crearFiltroRelacionExamen' ?>" method="POST">
                        <label>Examen</label>
                        <select name="idtblExamen" id="idtblExamen" class="form-control">
                            <option selected>Seleccione un Examen</option>
                            <?php foreach ($examen as $examenData) : ?>
                            <?php if(($examenData['estado'])==0): ?>
                                <option value="<?= $examenData['idtblExamen'] ?>"><?= $examenData['nombreExamen']; ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <label>Filtro</label> <br>
                        <select name="IDFiltro" id="IDFiltro" class="form-control" >
                            <option selected>Seleccione un Directorio</option>
                            <?php foreach ($filtro as $filtroData): ?>
                            <?php if(($filtroData['ESTADO'])==1): ?>
                                <option value="<?= $filtroData['ID']?>"><?=$filtroData['CIUDAD'].'/'.$filtroData['GESTION'].'/'.$filtroData['FACULTAD'].'/'.$filtroData['CARRERA'].'/'.$filtroData['SEMESTRE'].'/'.$filtroData['MATERIA'];?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                         </select>
                        <br>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>               
  

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
            //sweet alert para que se vea mas bonito
        </script>

        <script type="text/javascript">
            //muestra un alert si todo va bien
            let mensaje = "<?php echo $mensaje ?>";
            if (mensaje == '0') {
                swal('😎', 'Agregado con exito', 'success'); //alert("Agregado con exito");
            } else if (mensaje == '1') {
                swal('😑 ', 'Error en la insercion hay algo mal con la PK', 'error'); //alert("No se agrego, error en la insercion");    
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