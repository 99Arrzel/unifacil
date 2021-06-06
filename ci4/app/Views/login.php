<?php if(session()->get('isLoggedIn')) {
    header('Location: http://proyecto3.tk/');
    exit();
}
?>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset -sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">
                <h3>Login</h3>
                <hr>
                <?php if (session()->get('exitoso')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->get('exitoso') ?>
                </div>
                <?php endif; ?>
                <div id="box">
                    <form method="post">
                        <div class="form-group">
                            <h3>Nombre de usuario:</h3>
                            <input type="text" name="login" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <h3>Contraseña:</h3>
                            <input type="password" name="password" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <input id="button" type="submit" value="Ingresar" class="btn btn-primary">
                        </div>
                        <?php if (isset($validation)): //Muestra el error en la validación?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors()?>
                            </div>
                        </div>
                        <?php endif;?>
                        <p>¿Aún no te has registrado? <a href="/registrar">Registrate acá</a>.</p>
                        <span><?php //echo $login_error;?></span>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>