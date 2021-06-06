<?php if (!session()->get('isLoggedIn')) {
    header('Location: http://proyecto3.tk/login');
    exit();
}
            ?>
<div class="container">

    <div class="col-12 col-sm8- offset -sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
        <div class="container">
            <?php if (session()->get('exitoso')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->get('exitoso') ?>
            </div>

            <?php endif; ?>
            <h3>Perfil de usuario</h3>
            <hr>
            <h3>Bienvenido <?=  $usuario['nombreUsuario'] . ' ' . $usuario['apellido']?>
                <hr>
                <div id="box">
                    <form class="" action="/perfil" method="post">


                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombreUsuario" class="form-control" id="nombreUsuario"
                                value="<?= set_value('nombreUsuario', $usuario['nombreUsuario'])?>">
                        </div>


                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="text" name="apellido" class="form-control" id="apellido"
                                value="<?= set_value('apellido', $usuario['apellido'])?>">
                        </div>


                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" name="login" class="form-control" id="login"
                                value="<?= set_value('login', $usuario['login'])?>">
                        </div>


                        <div class="form-group">
                            <label>Correo Electronico</label>
                            <input type="email" name="email" class="form-control" id="email"
                                value="<?= set_value('email', $usuario['email'])?>"
                                readonly>
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
                                value="">
                        </div>

                        <div class="form-group">
                            <label>Ingresa tu password actual para cambiar los datos.</label>
                            <input id="seguro" type="password" name="seguro" class="form-control" value="">
                        </div>

                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Actualizar">

                </div>

                <?php if (isset($validation)): //Muestra el error en la validación?>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors()?>
                    </div>
                </div>
                <?php endif;?>
                </form>
        </div>
    </div>

</div>
<script src="/assets/js/porcentaje.js"></script>