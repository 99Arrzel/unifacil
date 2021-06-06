<?php if (session()->get('nivel') != 1) {
    header('Location: http://proyecto3.tk/');
}?>
<?php

    $idtblMateria = $datos[0]['idtblMateria'];
    $nombreMateria = $datos[0]['nombreMateria'];

?>

<body>
    <div class="container">
        <h1>Actualizar Materia</h1>
        <?php //print_r($datos);?>
        <div class="row">
            <div class="col-sm-12">
                <form method="POST"
                    action="<?php echo base_url() . '/actualizarMateria'?>">
                    <input type="text" id="idtblMateria" name="idtblMateria" hidden=""
                        value="<?php echo $idtblMateria ?>">
                    <!--poner los mismos nombres de las tablas para evitar confusion-->
                    <label for="nombreMateria">Materia</label>
                    <input type="text" name="nombreMateria" id="nombreMateria" class="form-control"
                        value="<?php echo $nombreMateria ?>">
                    <br>
                    <button class="btn btn-warning">Guardar</button>
                </form>
            </div>
        </div>
</body>