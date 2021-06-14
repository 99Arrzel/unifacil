<?php if (session()->get('nivel') > 2) {
    header('Location: http://proyecto3.tk/');
}?>
<?php

    $idtblAutor = $datos[0]['idtblAutor'];
    $nombreAutor = $datos[0]['nombreAutor'];
    $estado = $datos[0]['estado'];

?>

<body>
    <div class="container">
        <h1>Actualizar Autor</h1>
        <?php //print_r($datos);?>
        <div class="row">
            <div class="col-sm-12">
                <form method="POST"
                    action="<?php echo base_url() . '/actualizarAutor'?>">
                    <input type="text" id="idtblAutor" name="idtblAutor" hidden=""
                        value="<?php echo $idtblAutor ?>">
                    <!--poner los mismos nombres de las tablas para evitar confusion-->
                    <label for="nombreAutor">Nombre</label>
                    <input type="text" name="nombreAutor" id="nombreAutor" class="form-control"
                        value="<?php echo $nombreAutor ?>" required pattern="([A-zÀ-ž\s]){2,}">
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado" class="form-control" required>
                        <option selected>seleccione un estado</option>
                        <option value="0">Activo</option>
                        <option value="1">Inactivo</option>
                    </select>
                    <br>
                    <button class="btn btn-warning">Guardar</button>
                </form>
            </div>
        </div>
</body>