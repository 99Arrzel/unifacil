<?php if (session()->get('nivel') != 1) {
    header('Location: http://proyecto3.tk/');
}?>
<br>
<div class="container-fluid">
    <button type="button" id="botonOcultos" class="btn btn-warning" onclick="ocultos()">Mostrar
        Ocultos</button>
</div>
<div class="container-fluid">
    <h2>Listado de Directorios</h2>
    <div class="d-flex justify-content-start">
        <div class="col-sm">
            <div id="dirShow">
                <table class="table table-bordered table-dark">
                    <tr>
                        <th>Ciudad</th>
                        <th>Gestión</th>
                        <th>Facultad</th>
                        <th>Carrera</th>
                        <th>Semestre</th>
                        <th>Materia</th>
                        <th>Opción</th>
                    </tr>
                    <?php foreach ($dir as $dirdata): ?>
                    <form action="/adm-dir/eliminar" method="post" id='form<?=$dirdata['ID']?>'>
                        <tr>
                            <td>
                                <a><?=$dirdata['CIUDAD']?></a>
                            </td>
                            <td>
                                <a><?=$dirdata['GESTION']?></a>
                            </td>
                            <td>
                                <a><?=$dirdata['FACULTAD']?></a>
                            </td>
                            <td>
                                <a><?=$dirdata['CARRERA']?></a>
                            </td>
                            <td>
                                <a><?=$dirdata['SEMESTRE']?></a>
                            </td>
                            <td>
                                <a><?=$dirdata['MATERIA']?></a>
                            </td>
                            <td>
                                <button type="submit" name="idDir" value="<?=$dirdata['ID']?>"
                                    id='borrar<?=$dirdata['ID']?>' class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    </form>
                    <?php endforeach; ?>
                </table>
            </div>
            <div id="dirHidden" hidden>
                <table class="table table-bordered table-dark">
                    <tr>
                        <th>Ciudad</th>
                        <th>Gestión</th>
                        <th>Facultad</th>
                        <th>Carrera</th>
                        <th>Semestre</th>
                        <th>Materia</th>
                        <th>Opción</th>
                    </tr>
                    <?php foreach ($dirHidden as $dirdata): ?>
                    <form action="/adm-dir/restaurar" method="post" id='form<?=$dirdata['ID']?>'>
                        <tr>
                            <td>
                                <a><?=$dirdata['CIUDAD']?></a>
                            </td>
                            <td>
                                <a><?=$dirdata['GESTION']?></a>
                            </td>
                            <td>
                                <a><?=$dirdata['FACULTAD']?></a>
                            </td>
                            <td>
                                <a><?=$dirdata['CARRERA']?></a>
                            </td>
                            <td>
                                <a><?=$dirdata['SEMESTRE']?></a>
                            </td>
                            <td>
                                <a><?=$dirdata['MATERIA']?></a>
                            </td>
                            <td>
                                <button type="submit" name="idDir" value="<?=$dirdata['ID']?>"
                                    id='borrar<?=$dirdata['ID']?>' class="btn btn-success btn-small">Restaurar</a>
                            </td>
                        </tr>
                    </form>
                    <?php endforeach; ?>
                </table>
            </div>

        </div>
    </div>
    </div>

    <div class="d-flex justify-content-end">

        <h2>Lista Ciudad-Gestion</h2>
        <table class="table table-hover table-bordered table-dark">
            <tr>
                <th>Ciudad</th>
                <th>Gestión</th>
            </tr>
            <?php foreach ($filtro1 as $dirdata): ?>
            <form action="/adm-dir/restaurar" method="post" id='form<?=$dirdata['ID']?>'>
                <tr>
                    <td>
                        <a><?=$dirdata['CIUDAD']?></a>
                    </td>
                    <td>
                        <a><?=$dirdata['GESTION']?></a>
                    </td>
                    <td>
                        <button type="submit" name="idDir" value="<?=$dirdata['ID']?>" id='borrar<?=$dirdata['ID']?>'
                            class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            </form>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<script>
function mostrar(a) {
    var nom = document.getElementById('editar' + a).innerHTML;
    var actualPath = window.location.href;
    if (nom == "Editar") {
        document.getElementById('editar' + a).innerHTML = "Cancelar";
        document.getElementById('ciudad' + a).disabled = false;
        document.getElementById('gestion' + a).disabled = false;
        document.getElementById('facultad' + a).disabled = false;
        document.getElementById('carrera' + a).disabled = false;
        document.getElementById('semestre' + a).disabled = false;
        document.getElementById('materia' + a).disabled = false;
        document.getElementById('borrar' + a).innerHTML = "Guardar";
        document.getElementById('borrar' + a).type = "submit";
        document.getElementById('borrar' + a).className = "btn btn-success";
        document.getElementById('form' + a).action = "/adm-dir/editar"
    } else {
        document.getElementById('editar' + a).innerHTML = "Editar";
        document.getElementById('ciudad' + a).disabled = true;
        document.getElementById('gestion' + a).disabled = true;
        document.getElementById('facultad' + a).disabled = true;
        document.getElementById('carrera' + a).disabled = true;
        document.getElementById('semestre' + a).disabled = true;
        document.getElementById('materia' + a).disabled = true;
        document.getElementById('borrar' + a).innerHTML = "Eliminar";
        document.getElementById('borrar' + a).className = "btn btn-danger";
        document.getElementById('form' + a).action = "/adm-dir/eliminar"
    }
}

function ocultos() {
    var nom = document.getElementById('botonOcultos').innerHTML;
    if (nom == "Mostrar Ocultos") {
        document.getElementById('botonOcultos').className = "btn btn-success";
        document.getElementById('botonOcultos').innerHTML = "Ocultar elementos";
        document.getElementById('dirShow').hidden = true;
        document.getElementById('dirHidden').hidden = false;
    } else {
        document.getElementById('botonOcultos').className = "btn btn-warning";
        document.getElementById('botonOcultos').innerHTML = "Mostrar Ocultos";
        document.getElementById('dirShow').hidden = false;
        document.getElementById('dirHidden').hidden = true;
    }
}
</script>