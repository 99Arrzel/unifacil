<?php if (session()->get('nivel') > 2) {
    header('Location: http://proyecto3.tk/');
}?>
<?php

    $idtblAutor = $datos[0]['idtblAutor'];
    $nombreAutor = $datos[0]['nombreAutor'];

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
                        value="<?php echo $nombreAutor ?>">
                    <br>
                    <button class="btn btn-warning">Guardar</button>
                </form>
            </div>
        </div>
</body>