<?php if (session()->get('nivel') != 1) {
    header('Location: http://proyecto3.tk/');
}?>
<?php

    $idtblCiudad = $datos[0]['idtblCiudad'];
    $nombreCiudad = $datos[0]['nombreCiudad'];

?>

<body>
    <div class="container">
        <h1>Actualizar ciudad</h1>
        <?php //print_r($datos);?>
        <div class="row">
            <div class="col-sm-12">
                <form method="POST"
                    action="<?php echo base_url() . '/actualizar'?>">
                    <input type="text" id="idtblCiudad" name="idtblCiudad" hidden=""
                        value="<?php echo $idtblCiudad ?>">
                    <!--poner los mismos nombres de las tablas para evitar confusion-->
                    <label for="nombreCiudad">Nombre</label>
                    <input type="text" name="nombreCiudad" id="nombreCiudad" class="form-control"
                        value="<?php echo $nombreCiudad ?>">
                    <br>
                    <button class="btn btn-warning">Guardar</button>
                </form>
            </div>
        </div>
</body>