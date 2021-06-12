<br>
<div class='container-fluid'>
    <h1 class="text-center">Crear Usuario</h1>
    <div id='crear'>
        <div class='row'>
            <div class='col-12'>
                <div class='table table-bordered bg-dark text-light'>
                    <table id="insertar" class='col-12 table table-dark'>
                        <thead class='thead-dark'>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Login</th>
                                <th>Email</th>
                                <th>Contraseña</th>
                                <th>Suscrito</th>
                                <th>Nivel</th>
                                <th>Crear</th>
                            </tr>
                        </thead>
                        <form class='' action='/ListarUsuarios' method='post'>
                            <tbody>
                                <tr>
                                    <td><input type='text' name='nombre' class='form-control'></input></td>
                                    <td><input type='text' name='apellido' class='form-control'></input></td>
                                    <td><input autocomplete="username" type='text' name='login'
                                            class='form-control'></input></td>
                                    <td><input autocomplete="email" type='text' name='email'
                                            class='form-control'></input></td>
                                    <td><input autocomplete="current-password" type='password' name='password'
                                            class='form-control'></input></td>
                                    <!-- SUS-->
                                    <td><select class='form-control' name='suscrito'>
                                            <option value='1'>SUSCRITO
                                            </option>
                                            <option value='2'> NO SUSCRITO
                                            </option>
                                        </select></td>
                                    <!-- SUS-->
                                    <!-- Nivel-->
                                    <td><select class='form-control' name='nivel'>
                                            <?php foreach ($nivel as $niveles): ?>
                                            <option
                                                value="<?=$niveles['ID'];?>">
                                                <?=$niveles['NIVEL'];?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select></td>
                                    <!-- Nivel-->
                                    <td><button type='submit' class='btn btn-success form-control'>Enviar</td>
                                </tr>
                            </tbody>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($validation)): ?>
    <div class='col-12'>
        <div class='alert alert-danger' role='alert'>
            <?=$validation->listErrors() ?>
        </div>
    </div>
    <?php
endif; ?>
    <?php if (session()
    ->get('exitoso')): ?>
    <div class='alert alert-success' role='alert'>
        <?=session()
        ->get('exitoso') ?>
    </div>
    <?php
endif;
?>
    <h1 class="text-center">Listar Usuarios</h1>
    <button id='botonOcultar' type='button' onclick='mostrar()' class='btn btn-primary'>Mostrar de alta</button>
</div>
<!-- Modal para editar usuario -->
<div class="modal fade" id="dropEdit" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div id="myModal" class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="insertar" class='col-12 table table-dark'>
                    <thead class='thead-dark'>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Login</th>
                            <th>Email</th>
                            <th>Contraseña</th>
                            <th>Suscrito</th>
                            <th>Nivel</th>
                            <th>Crear</th>
                        </tr>
                    </thead>
                    <form class='' action='/ListarUsuarios' method='post'>
                        <label id="idUsuario" value=""></label>
                        <tbody>
                            <tr>
                                <td><input id="nombreModal" autocomplete="off" type='text' name='nombre' class='form-control'></input></td>
                                <td><input id="apellidoModal" autocomplete="off" type='text' name='apellido' class='form-control'></input></td>
                                <td><input id="loginModal" autocomplete="off" type='text' name='login'
                                        class='form-control'></input></td>
                                <td><input id="emailModal" autocomplete="off" type='text' name='email' class='form-control'></input>
                                </td>
                                <td><input id="passwordModal" autocomplete="off" type='password' name='password'
                                        class='form-control'></input></td>
                                <!-- SUS-->
                                <td><select id="suscritoModal" class='form-control' name='suscrito'>
                                        <option value='1'>SUSCRITO
                                        </option>
                                        <option value='2'> NO SUSCRITO
                                        </option>
                                    </select></td>
                                <!-- SUS-->
                                <!-- Nivel-->
                                <td><select id="nivelModal" class='form-control' name='nivel'>
                                        <?php foreach ($nivel as $niveles): ?>
                                        <option
                                            value="<?=$niveles['ID'];?>">
                                            <?=$niveles['NIVEL'];?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <!-- Nivel-->
                                <td><button id="btnModal" type='submit' class='btn btn-success form-control'>Enviar</td>
                            </tr>
                        </tbody>
                    </form>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- FIN de modal para insertar usuario -->
<!-- Insertar arriba -->
<br>
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-hover" id="tblUsuarios">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Login</th>
                    <th>Correo</th>
                    <th>Nivel</th>
                    <th>Suscrito</th>
                    <th>Editar</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        var tabla = $('#tblUsuarios').DataTable({
            data: <?php echo json_encode($usuario)?> ,
            "columnDefs": [{
                "targets": 7,
                "data": null,
                "defaultContent": "<button class='btn btn-warning' data-toggle='modal' data-target='#dropEdit'>Editar</button>"
            }],
            columns: [{
                    data: 'IDUSER',
                    visible: false,
                },
                {
                    data: 'NOMBRE'
                },
                {
                    data: 'APELLIDO'
                },
                {
                    data: 'LOGIN'
                },
                {
                    data: 'EMAIL'
                },
                {
                    data: 'NIVEL'
                },
                {
                    data: 'SUSCRITO'
                },
            ],
        });
        $('#tblUsuarios tbody').on('click', 'button', function() {
            var data = tabla.row($(this).parents('tr')).data();
            document.getElementById("nombreModal").value = data['NOMBRE'];
            document.getElementById("apellidoModal").value = data['APELLIDO'];
            document.getElementById("loginModal").value = data['LOGIN'];
            document.getElementById("emailModal").value = data['EMAIL'];
            document.getElementById("passwordModal").value = data['CONTRASEÑA'];
            document.getElementById("suscritoModal").value = data['SUSCRITO'];
            document.getElementById("nivelModal").value = data['NIVELID'];
            document.getElementById("idUsuario").value = data['IDUSER'];
            //data-toggle="modal" data-target="#staticBackdrop"
            //alert(data['NOMBRE'] + "id");
            console.log(data);
        });
    });
</script>