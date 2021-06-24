<?php if(session()->get('isLoggedIn')) {
    header('Location: http://proyecto3.tk/');
    exit();
}?>
<div class="container">

    <div class="col-12 col-sm8- offset -sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
        <div class="container">

            <h1>Registrate en Unifacil</h1>
            <hr>
            <h3>Llena los campos para registrarte</h3>

            <div id="box">
                <form class="" action="/registrar" method="post">


                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombreUsuario" class="form-control" id="nombreUsuario" value="" required pattern="([A-zÀ-ž\s]){2,}">
                    </div>


                    <div class="form-group">
                        <label>Apellido</label>
                        <input type="text" name="apellido" class="form-control" id="apellido" value="" required pattern="([A-zÀ-ž\s]){2,}">
                    </div>


                    <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" name="login" class="form-control" id="login" value="" required pattern="([A-zÀ-ž0-9\s]){2,}">
                    </div>


                    <div class="form-group">
                        <label>Correo Electronico</label>
                        <input type="email" name="email" class="form-control" id="email" value="">
                    </div>


                    <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="password" name="password" class="form-control" id="password"
                            value="">

                    </div>


                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                            aria-valuemax="100" style="width:0%">
                            <label>Seguridad</label>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Confirma la Password</label>
                        <input id="confirma_password" type="password" name="confirma_password" class="form-control"
                            id="confirma_password" value="">
                    </div>

            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Enviar">
                <input type="reset" class="btn btn-secondary ml-2" value="Limpiar">
            </div>

            <?php if (isset($validation)): //Muestra el error en la validación?>
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    <?= $validation->listErrors()?>
                </div>
            </div>
            <?php endif;?>
            <h4>¿Ya tienes una cuenta? <a href="/login">Ingresa acá</a>.</h4>
            </form>
        </div>
    </div>

</div>
<script src="/assets/js/porcentaje.js"></script>