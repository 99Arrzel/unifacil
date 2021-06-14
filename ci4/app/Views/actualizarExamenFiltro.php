<?php if (session()->get('nivel') > 2) {
    header('Location: http://proyecto3.tk/');
}
?>
<?php
    $idtblExamen = $datos[0]['idtblExamen'];
    $nombreExamen = $datos[0]['nombreExamen'];
    $year = $datos[0]['year'];
    $paralelo = $datos[0]['paralelo'];
    $dirDoc = $datos[0]['dirDoc'];
    $estado =$datos[0]['estado'];
    $idtblImagen=$datosimg[0]['idtblImagen'];
    $nombreImagen = $datosimg[0]['nombreImagen'];
    $idtblAutor =$datosaut[0]['idtblAutor'];
    $nombreAutor= $datosaut[0]['nombreAutor'];
    $idtblTag = $datostag[0]['idtblTag'];
    $nombreTag = $datostag[0]['nombreTag'];
    $idfiltroFinal = $datosfil[0]['idfiltroFinal'];
?>

<body>
    <div class="container">
        <h1>Actualizar Examen</h1>
        <?php //print_r($datos); ?>
        <?php //print_r($datosimg); ?>
        <?php //print_r($datosaut); ?>

        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="<?php echo base_url() . '/actualizarExamenFiltro'?>">
                    <input type="text" id="idtblExamen" name="idtblExamen" hidden=""
                        value="<?php echo $idtblExamen ?>">
                    <!--poner los mismos nombres de las tablas para evitar confusion-->

                    <label for="nombreExamen">Nombre del Examen</label>
                    <input type="text" name="nombreExamen" id="nombreExamen" class="form-control"
                        value="<?php echo $nombreExamen?>">

                    <label for="year">Año</label>
                    <input type="text" name="year" id="year" class="form-control"
                        value="<?php echo $year ?>">

                    <label for="paralelo">Paralelo</label>
                    <input type="text" name="paralelo" id="paralelo" class="form-control"
                        value="<?php echo $paralelo ?>">

                    <label for="dirDoc">URL del Examen</label>
                    <input type="text" name="dirDoc" id="dirDoc" class="form-control"
                        value="<?php echo $dirDoc ?>">

                    <label for="estado">Estado del Examen</label>
                    <select name="estado" id="estado" class="form-control" required>
                        <option selected>seleccione un estado</option>
                        <option value="0">Activo</option>
                        <option value="1">Inactivo</option>
                    </select>
    
                    <input type="text" id="idtblImagen" name="idtblImagen" hidden=""
                        value="<?php echo $idtblImagen ?>">

                    <label for="nombreImagen">Nombre de la imagen</label>
                    <input type="text" name="nombreImagen" id="nombreImagen" class="form-control"
                        value="<?php echo $nombreImagen ?>">

                     <input type="text" id="idtblAutor" name="idtblAutor" hidden=""
                        value="<?php echo $idtblAutor ?>">

                    <label for="nombreAutor">Nombre del Autor</label>
                    <select name="tblAutor_idtblAutor" id="tblAutor_idtblAutor" class="form-control" required>
                        <option selected>seleccione un autor</option>
                        <?php foreach ($datosaut as $key):?>
                        <option value="<?php echo $key['idtblAutor']?>"><?php echo $key['nombreAutor']?></option>
                        <?php endforeach; ?>
                    </select>  
                    
                    <input type="text" id="idtblTag" name="idtblTag" hidden=""
                        value="<?php echo $idtblTag ?>">

                    <label for="nombreTag">Nombre del Tag</label>
                    <input type="text" name="nombreTag" id="nombreTag" class="form-control"
                        value="<?php echo $nombreTag ?>">   

                    <label for="nombreTag">Direccion del filtro</label>
                    <input type="text" name="idfiltroFinal" id="idFiltroFinal" class="form-control"
                        value="<?php echo $idfiltroFinal ?>">   

                    <br>
                    <button class="btn btn-warning">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</body>