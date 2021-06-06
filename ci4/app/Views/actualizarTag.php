<?php if (session()->get('nivel') > 2) {
    header('Location: http://proyecto3.tk/');

}?>
<?php

    $idtblTag = $datos[0]['idtblTag'];
    $nombreTag = $datos[0]['nombreTag'];

?>

<body>
    <div class="container">
        <h1>Actualizar Tag</h1>
        <?php //print_r($datos);?>
        <div class="row">
            <div class="col-sm-12">
                <form method="POST"
                    action="<?php echo base_url() . '/actualizarTag'?>">
                    <input type="text" id="idtblTag" name="idtblTag" hidden=""
                        value="<?php echo $idtblTag ?>">
                    <!--poner los mismos nombres de las tablas para evitar confusion-->
                    <label for="nombreTag">Tag</label>
                    <input type="text" name="nombreTag" id="nombreTag" class="form-control"
                        value="<?php echo $nombreTag ?>">
                    <br>
                    <button class="btn btn-warning">Guardar</button>
                </form>
            </div>
        </div>
</body>