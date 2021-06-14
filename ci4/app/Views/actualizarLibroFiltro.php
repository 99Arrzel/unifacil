<?php if (session()->get('nivel') > 2) {
    header('Location: http://proyecto3.tk/');
}
?>
<?php
    $idtblLibro = $datos[0]['idtblLibro'];
    $nombreLibro = $datos[0]['nombreLibro'];
    $year = $datos[0]['year'];
    $edicion = $datos[0]['edicion'];
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
        <h1>Actualizar Libro</h1>
        <?php //print_r($datos); ?>
        <?php //print_r($datosimg); ?>
        <?php //print_r($datosaut); ?>

        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="<?php echo base_url() . '/actualizarLibroFiltro'?>">
                    <input type="text" id="idtblLibro" name="idtblLibro" hidden=""
                        value="<?php echo $idtblLibro ?>">
                    <!--poner los mismos nombres de las tablas para evitar confusion-->

                    <label for="nombreLibro">Nombre del Libro</label>
                    <input type="text" name="nombreLibro" id="nombreLibro" class="form-control"
                        value="<?php echo $nombreLibro?>" required pattern="([A-zÀ-ž\s]){2,}">

                    <label for="year">Año</label>
                    <input type="text" name="year" id="year" class="form-control"
                        value="<?php echo $year ?>">

                    <label for="edicion">Edicion</label>
                    <input type="text" name="edicion" id="edicion" class="form-control"
                        value="<?php echo $edicion ?>" required pattern="([A-zÀ-ž\s]){2,}">

                    <label for="dirDoc">URL del Libro</label>
                    <input type="url" name="dirDoc" id="dirDoc" class="form-control"
                        value="<?php echo $dirDoc ?>">

                    <label for="estado">Estado del Libro</label>
                    <select name="estado" id="estado" class="form-control" required>
                        <option selected>seleccione un estado</option>
                        <option value="0">Activo</option>
                        <option value="1">Inactivo</option>
                    </select>
    
                    <input type="text" id="idtblImagen" name="idtblImagen" hidden=""
                        value="<?php echo $idtblImagen ?>">

                    <label for="nombreImagen">Nombre de la imagen</label>
                    <input type="text" name="nombreImagen" id="nombreImagen" class="form-control"
                        value="<?php echo $nombreImagen ?>" required pattern="([A-zÀ-ž0-9\s]){2,}">

                     <input type="text" id="idtblAutor" name="idtblAutor" hidden=""
                        value="<?php echo $idtblAutor ?>">

                    <label for="nombreAutor">Nombre del Autor Principal</label>
                    <input type="text" name="nombreAutor" id="nombreAutor" class="form-control"
                        value="<?php echo $nombreAutor ?>" required pattern="([A-zÀ-ž\s]){2,}">   
                    
                    <input type="text" id="idtblTag" name="idtblTag" hidden=""
                        value="<?php echo $idtblTag ?>">

                    <label for="nombreTag">Nombre del Tag</label>
                    <input type="text" name="nombreTag" id="nombreTag" class="form-control"
                        value="<?php echo $nombreTag ?>" required pattern="([A-zÀ-ž\s]){2,}">   

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