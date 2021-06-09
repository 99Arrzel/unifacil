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
    print_r($datosaut);
    $idtblAutor =$datosaut['idtblAutor'];

    $idtblAutor = array_map('intval', explode(',', $IDsAutores));

    //$nombreAutor= $datosaut[0]['nombreAutor'];
    print_r($IDsAutores);
?>

<body>
    <div class="container">
        <h1>Actualizar Libro</h1>
        <?php print_r($datos); ?>
        <?php print_r($datosimg); ?>
        <?php print_r($datosaut); ?>

        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="<?php echo base_url() . '/actualizarLibro'?>">
                    <input type="text" id="idtblLibro" name="idtblLibro" hidden=""
                        value="<?php echo $idtblLibro ?>">
                    <!--poner los mismos nombres de las tablas para evitar confusion-->

                    <label for="nombreLibro">Nombre del Libro</label>
                    <input type="text" name="nombreLibro" id="nombreLibro" class="form-control"
                        value="<?php echo $nombreLibro?>">

                    <label for="year">Año</label>
                    <input type="text" name="year" id="year" class="form-control"
                        value="<?php echo $year ?>">

                    <label for="edicion">Edicion</label>
                    <input type="text" name="edicion" id="edicion" class="form-control"
                        value="<?php echo $edicion ?>">

                    <label for="dirDoc">URL del Libro</label>
                    <input type="text" name="dirDoc" id="dirDoc" class="form-control"
                        value="<?php echo $dirDoc ?>">

                    <label for="estado">Estado del Libro</label>
                    <select name="estado" id="estado" class="form-control" required>
                        <option selected>seleccione un estado</option>
                        <option value="0">Activo</option>
                        <option value="1">Inactivo</option>
                    </select>
    
                    <input type="text" id="idtblImagen" name="idtblImagen" hidden=""
                        value="<?php echo $idtblImagen ?>">

                    <label for="nombreImagen">Nombre de la imagenXD</label>
                    <input type="text" name="nombreImagen" id="nombreImagen" class="form-control"
                        value="<?php echo $nombreImagen ?>">

                     <input type="text" id="idtblAutor" name="idtblAutor" hidden=""
                        value="<?php echo $idtblAutor ?>">

                    <label for="nombreAutor">Nombre del/los Autores</label>
                    <input type="text" name="nombreAutor" id="nombreAutor" class="form-control"
                        value="<?php echo $nombreAutor ?>">   
                    <br>
                    <button class="btn btn-warning">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</body>