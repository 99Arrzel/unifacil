<div class="container">
    <div class="container">
        <br>
        <h2>Listado de Directorios</h2>
        <?php //print_r($datos);?>
        <div class="row">

            <div class="table table-responsive">
                <table class="table table-hover table-bordered table-dark">
                    <tr>
                        <th>Ciudad</th>
                        <th>Gestión</th>
                        <th>Facultad</th>
                        <th>Carrera</th>
                        <th>Semestre</th>
                        <th>Materia</th>
                        
                    </tr>
                    <?php foreach ($dir as $dirdata): ?>
                    <form action="/adm-dir/eliminar" method="post" id='form<?=$dirdata['ID']?>'>
                        <tr>
                            <td>
                                <select class="form-control" name="aciudad" id="ciudad<?=$dirdata['ID']?>"
                                     disabled>
                                    <option value='<?= $dirdata['CIUDAD'] ?>' selected>
                                        <?php echo $dirdata['CIUDAD'] ?>
                                    </option>
                                    <?php foreach ($ciudad as $ciudadData): ?>
                                    <option class="dropdown-item" value="<?= $ciudadData['IDciudad']?>">
                                        <?= $ciudadData['Ciudad']?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="agestion" id="gestion<?=$dirdata['ID']?>"
                                    disabled>
                                    <option value='<?= $dirdata['IDgestion'] ?>' selected>
                                        <?php echo $dirdata['Gestión'] ?>
                                    </option>
                                    <?php foreach ($gestion as $gestionData): ?>
                                    <option class="dropdown-item" value="<?= $gestionData['ID']?>">
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="afacultad" id="facultad<?=$dirdata['ID']?>"
                                    disabled>
                                    <option value='<?= $dirdata['FACULTAD'] ?>' selected>
                                        
                                    </option>
                                    <?php foreach ($facultad as $facultadData): ?>
                                    <option class="dropdown-item" value="<?= $facultadData['FACULTAD']?>">
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="acarrera" id="carrera<?=$dirdata['ID']?>"
                                    disabled>
                                    <option value='<?= $dirdata['CARRERA'] ?>' selected>
                                        
                                    </option>
                                    <?php foreach ($carrera as $carreraData): ?>
                                    <option class="dropdown-item" value="<?= $carreraData['CARRERA']?>">
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="asemestre" id="semestre<?=$dirdata['ID']?>"
                                    disabled>
                                    <option value='<?= $dirdata['IDsemestre'] ?>' selected>
                                        <?php echo $dirdata['Semestre'] ?>
                                    </option>
                                    <?php foreach ($semestre as $semestreData): ?>
                                    <option class="dropdown-item" value="<?= $semestreData['IDsemestre']?>">
                                        <?= $semestreData['Semestre']?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="amateria" id="materia<?=$dirdata['ID']?>"
                                    disabled>
                                    <option value='<?= $dirdata['IDmateria'] ?>' selected>
                                        <?php echo $dirdata['Materia'] ?>
                                    </option>
                                    <?php foreach ($materia as $materiaData): ?>
                                    <option class="dropdown-item" value="<?= $materiaData['IDmateria']?>">
                                        <?= $materiaData['Materia']?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td><button type="button" class="btn btn-warning btn-small"
                                    id='editar<?=$dirdata['ID']?>'
                                    onclick="mostrar(<?=$dirdata['ID']?>)">Editar</button>
                            </td>
                            <td>
                                <button type="submit" name="idDir" value="<?=$dirdata['ID']?>"
                                    id='borrar<?=$dirdata['ID']?>' class="btn btn-danger btn-small">Eliminar</a>
                            </td>
                        </tr>
                    </form>
                    <?php endforeach; ?>
                </table>
                <div class="form-group">
                    <button type="button" id="botonOcultos" class="btn btn-warning" onclick="ocultos()">Mostrar
                        Ocultos</button>
                </div>
                <div id="misOcultos" hidden>
                    <table class="table table-hover table-bordered table-dark">
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
                                    <a ><?=$dirdata['Ciudad']?></a>
                                </td>
                                <td>
                                <a ><?=$dirdata['Gestión']?></a>
                                </td>
                                <td>
                                <a ><?=$dirdata['Facultad']?></a>
                                </td>
                                <td>
                                <a ><?=$dirdata['Carrera']?></a>
                                </td>
                                <td>
                                <a ><?=$dirdata['Semestre']?></a>
                                </td>
                                <td>
                                <a ><?=$dirdata['Materia']?></a>
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
<!-- Para insertar abajo-->
    </div>
    <h2>Crear Directorio</h2>
    <form class="" action="/adm-dir-registrar" method="post">
        <div class="row form-group">
            <div class="col">
                <select class="form-control form-control-lg" name="ciudad" id="ciudad">
                    <option selected>Elige una ciudad</option>
                    <?php foreach ($ciudad as $ciudadData): ?>
                    <option class="dropdown-item" value="<?= $ciudadData['IDciudad']?>">
                        <?= $ciudadData['Ciudad']?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <select class="form-control form-control-lg" name="gestion" id="gestion">>
                    <option selected>Elige una Gestión</option>
                    <?php foreach ($gestion as $gestionData): ?>
                    <option class="dropdown-item" value="<?= $gestionData['IDgestión']?>">
                        <?= $gestionData['Gestión']?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col">
                <select class="form-control form-control-lg" name="facultad" id="facultad">
                    <option selected>Elige una facultad</option>
                    <?php foreach ($facultad as $facultadData): ?>
                    <option class="dropdown-item" value="<?= $facultadData['IDfacultad']?>">
                        <?= $facultadData['Facultad']?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <select class="form-control form-control-lg" name="carrera" id="carrera">
                    <option selected>Elige una carrera</option>
                    <?php foreach ($carrera as $carreraData): ?>
                    <option class="dropdown-item" value="<?= $carreraData['IDcarrera']?>">
                        <?= $carreraData['Carrera']?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col">
                <select class="form-control form-control-lg" name="semestre" id="semestre">
                    <option selected>Elige un semestre</option>
                    <?php foreach ($semestre as $semestreData): ?>
                    <option class="dropdown-item" value="<?= $semestreData['IDsemestre']?>">
                        <?= $semestreData['Semestre']?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <select class="form-control form-control-lg" name="materia" id="materia">
                    <option selected>Elige una materia</option>
                    <?php foreach ($materia as $materiaData): ?>
                    <option class="dropdown-item" value="<?= $materiaData['IDmateria']?>">
                        <?= $materiaData['Materia']?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Guardar">
        </div>
        <?php if (session()->get('exitoso')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->get('exitoso') ?>
        </div>

        <?php endif; ?>
        <?php if (session()->get('validation')): ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->get('validation') ?>
        </div>
        <?php endif; ?>
    </form>
</div>
<br>
<br>
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
        document.getElementById('misOcultos').hidden = false;
    } else {
        document.getElementById('botonOcultos').className = "btn btn-warning";
        document.getElementById('botonOcultos').innerHTML = "Mostrar Ocultos";
        document.getElementById('misOcultos').hidden = true;
    }


}
</script>