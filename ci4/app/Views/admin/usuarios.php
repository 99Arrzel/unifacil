<?php if (session()->get('nivel') != 1) {
    header('Location: http://proyecto3.tk/');
}
?>
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
                                    <td><input type='text' name='login' class='form-control'></input></td>
                                    <td><input type='text' name='email' class='form-control'></input></td>
                                    <td><input type='password' name='password' class='form-control'></input></td>
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
                                            <option value="<?=$niveles['ID'];?>">
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

<!-- Botón y demás cosas abajo, arriba registrar nuevo usuario -->

<!-- ===  ===  ===  ===  == Tablas que no están de baja ===  ===  ===  ===  ===  == -->
<div class='container-fluid'>
    <div id='recargarTabla'>
        <div class='row'>
            <div class='col-12'>
                <div class='table table-bordered bg-dark text-light'>
                <table id=" tablasVistas" class='col-12 table table-dark'
                data-toggle="table" data-pagination="true" data-search="true">
                        <thead class='thead-dark'>
                            <tr>
                                <th data-field="vusuario.nombre" data-sortable="true">Nombre</th>
                                <th data-field="vusuario.apellido" data-sortable="true">Apellido</th>
                                <th data-field="vusuario.login" data-sortable="true">Login</th>
                                <th data-field="vusuario.email" data-sortable="true">Email</th>
                                <th data-field="vusuario.suscrito">Suscrito</th>
                                <th data-field="vusuario.nivel" data-sortable="true" >Nivel</th>
                                <th >Editar</th>
                                <th >Dar de baja</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuario as $usuarios): ?>
                            <form id="misUsuarios<?=$usuarios['IDUSER']?>" method='post' autocomplete='off'>
                                <tr>
                                    <td><input id="nom<?=$usuarios['IDUSER'];?>" type=text
                                            value="<?=$usuarios['NOMBRE']; ?>" class='form-control' disabled></input>
                                    </td>
                                    <td><input id="ape<?=$usuarios['IDUSER']; ?>" type=text
                                            value="<?=$usuarios['APELLIDO']; ?>" class='form-control' disabled></input>
                                    </td>
                                    <td><input id="log<?=$usuarios['IDUSER']; ?>" type=text
                                            value="<?=$usuarios['LOGIN']; ?>" class='form-control' disabled></input>
                                    </td>
                                    <td><input id="ema<?=$usuarios['IDUSER']; ?>" type=text
                                            value="<?=$usuarios['EMAIL']; ?>" class='form-control' disabled></input>
                                    </td>
                                    <!-- SUSCRITO -->
                                    <td><button id="sus<?=$usuarios['IDUSER']; ?>" type="button"
                                            onclick="suscrito(<?=$usuarios['IDUSER']; ?>)"
                                            class="<?php if ($usuarios['SUSCRITO'] == 1) {echo 'btn btn-primary form-control';} else {echo 'btn btn-secondary form-control';}?>"
                                            value="<?php if ($usuarios['SUSCRITO'] == 1) {  echo '0';} else {echo '1';} ?>">
                                            <?php if ($usuarios['SUSCRITO'] == 1) {echo 'SUSCRITO';} else {echo 'NO SUSCRITO';}?>
                                        </button></td>
                                    <!-- SUSCRITO -->
                                    <td><select class="form-control" id="niv<?=$usuarios['IDUSER']; ?>" disabled>
                                            <option value="<?=$usuarios['NIVELID']; ?>"
                                                selected="<?=$usuarios['NIVELID']; ?>">
                                                <?=$usuarios['NIVEL'];?>
                                            </option>
                                            <?=$usuarios['NIVEL'];?>
                                            <?php foreach ($nivel as $niveles): ?>
                                            <!-- Skip el que se repite -->
                                            <?php if ($niveles['ID'] == $usuarios['NIVELID']) {continue;}?>
                                            <!-- Hecho de niveles XD -->
                                            <option value="<?=$niveles['ID']; ?>">
                                                <?=$niveles['NIVEL'];?>
                                            </option>
                                            <?php endforeach;?>
                                        </select></td>
                                    <td><button type='button' onclick="editar(<?=$usuarios['IDUSER']; ?>)"
                                            id="bttnEditar<?=$usuarios['IDUSER']; ?>"
                                            class='btn btn-warning form-control'>Editar</button>
                                    </td>
                                    <td><button type="button" onclick="eliminar(<?=$usuarios['IDUSER']?>)"
                                            id="bttnEliminar<?=$usuarios['IDUSER']?>""
                                            class='btn btn-danger form-control'>Baja</button>
                                    </td>
                                </tr>
                        </form>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ===  ===  ===  ===  == Tablas de baja ===  ===  ===  ===  ===  == -->
    <div id='recargarTablaBaja'>
        <div class='row'>
            <div class='col-12'>
                <div class='table table-bordered bg-dark text-light'>
                <table id=" tablasNoVistas" class='col-12 table table-dark' data-toggle="table" data-pagination="true" data-search="true">
                                            <thead class='thead-dark'>
                                                <tr>
                                                    <th data-sortable="true" data-field="nvNombre">Nombre</th>
                                                    <th data-sortable="true" data-field="nvApellido">Apellido</th>
                                                    <th data-sortable="true" data-field="nvLogin">Login</th>
                                                    <th data-sortable="true" data-field="nvEmail">Email</th>
                                                    <th data-field="nvSuscrito">Suscrito</th>
                                                    <th data-sortable="true" data-field="nvNivel">Nivel</th>
                                                    <th data-field="nvEditar">Editar</th>
                                                    <th data-field="nvBaja">Dar de baja</th>
                                                </tr>
                                            </thead>
                        <tbody>
                            <?php foreach ($usuarioBaja as $usuarios): ?>
                            <form id=" misUsuarios<?=$usuarios['IDUSER']; ?>" method='post' autocomplete='off'>

                                <tr>
                                    <td><input id="nom<?=$usuarios['IDUSER']; ?>" type=text
                                            value="<?=$usuarios['NOMBRE']; ?>" class='form-control' disabled></input>
                                    </td>
                                    <td><input id="ape<?=$usuarios['IDUSER']; ?>" type=text
                                            value="<?=$usuarios['APELLIDO']; ?>" class='form-control' disabled></input>
                                    </td>
                                    <td><input id="log<?=$usuarios['IDUSER']; ?>" type=text
                                            value="<?=$usuarios['LOGIN']; ?>" class='form-control' disabled></input>
                                    </td>
                                    <td><input id="ema<?=$usuarios['IDUSER']; ?>" type=text
                                            value="<?=$usuarios['EMAIL']; ?>" class='form-control' disabled></input>
                                    </td>
                                    <!-- SUSCRITO -->
                                    <td><button id="sus<?=$usuarios['IDUSER']; ?>" type='button'
                                            onclick="suscrito(<?=$usuarios['IDUSER']; ?>)"
                                            class="<?php if ($usuarios['SUSCRITO'] == 1) {echo 'btn btn-primary form-control';} else{echo 'btn btn-secondary form-control';}?>"
                                            value="<?php if ($usuarios['SUSCRITO'] == 1) {echo '0';} else {echo '1';}?>">
                                            <?php if ($usuarios['SUSCRITO'] == 1) { echo 'SUSCRITO';} else { echo 'NO SUSCRITO';}?>
                                        </button></td>
                                    <!-- SUSCRITO -->
                                    <td><select class='form-control' id="niv<?=$usuarios['IDUSER']; ?>" disabled>
                                            <option value="<?=$usuarios['NIVELID']; ?>"
                                                selected="<?=$usuarios['NIVELID']; ?>">
                                                <?=$usuarios['NIVEL'];?>
                                            </option>
                                            <?=$usuarios['NIVEL'];?>
                                            <?php foreach ($nivel as $niveles): ?>
                                            <!-- Skip el que se repite -->
                                            <?php if ($niveles['ID'] == $usuarios['NIVELID']) { continue;}?>
                                            <!-- Hecho de niveles XD -->
                                            <option value="<?=$niveles['ID']; ?>">
                                                <?=$niveles['NIVEL'];?>
                                            </option>
                                            <?php endforeach;?>
                                        </select></td>
                                    <td><button type='button' onclick="editar(<?=$usuarios['IDUSER']; ?>)"
                                            id="bttnEditar<?=$usuarios['IDUSER']; ?>"
                                            class='btn btn-warning form-control'>Editar</button>
                                    </td>
                                    <td><button type='button' onclick="restaurar(<?=$usuarios['IDUSER']; ?>)"
                                            id="bttnEliminar<?=$usuarios['IDUSER']; ?>"
                                            class='btn btn-success form-control'>Restaurar</button>
                                    </td>
                                </tr>
                            </form>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript' src='<?=base_url()?>/assets/js/admUsuarios.js'>
</script>