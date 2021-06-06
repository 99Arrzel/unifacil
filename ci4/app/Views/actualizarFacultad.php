<?php if (session()->get('nivel') != 1) {
    header('Location: http://proyecto3.tk/');
}?>
<?php

    $idtblFacultad = $datos[0]['idtblFacultad'];
    $nombreFacultad = $datos[0]['nombreFacultad'];

?>

<body>
    <div class="container">
        <h1>Actualizar Facultad</h1>
        <?php //print_r($datos);?>
        <div class="row">
            <div class="col-sm-12">
                <form method="POST"
                    action="<?php echo base_url() . '/actualizarFacultad'?>">
                    <input type="text" id="idtblFacultad" name="idtblFacultad" hidden=""
                        value="<?php echo $idtblFacultad ?>">
                    <!--poner los mismos nombres de las tablas para evitar confusion-->
                    <label for="nombreFacultad">Nombre</label>
                    <input type="text" name="nombreFacultad" id="nombreFacultad" class="form-control"
                        value="<?php echo $nombreFacultad ?>">
                    <br>
                    <button class="btn btn-warning">Guardar</button>
                </form>
            </div>
        </div>
</body>