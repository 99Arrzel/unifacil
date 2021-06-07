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
<!-- Insertar arriba -->
<br>
<p>Fix: Nivel DropDown y Ajax al borrar (Cómo se recarga con Ajax????¿¿?¿?)</p>
<div id="Activos" class="container-fluid">
    <table id="UsuariosActivos" class="col-12 table table-dark">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Login</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Suscrito</th>
                <th>Nivel</th>
                <th>Editar</th>
                <th>Dar de baja</th>
            </tr>
        </thead>
    </table>
</div>
<script>
    var datos = <?= json_encode($usuario)?> ;
    $(document).ready(function() {
        $('#UsuariosActivos').DataTable({
            RoweditMode($(this).parent());
            data: datos,
            columns: [{
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
                    "visible": false,
                    data: 'CONTRASEÑA',
                },
                {
                    data: 'SUSCRITO'
                },
                {
                    data: 'NIVEL'
                },
                {
                    data: null,
                    defaultContent: "<button type='button' class='btn btn-info'>Editar</button>"
                },
                {
                    data: null,
                    defaultContent: "<button type='button' class='btn btn-info'>Eliminar</button>"
                },
            ]
        });
    });

    function RoweditMode(rowid) {
        var prevRow;
        var rowIndexVlaue = parseInt(rowid.attr("indexv"));
        if (editIndexTable == -1) {
            saveRowIntoArray(rowid);
            rowid.attr("editState", "editState");
            editIndexTable = rowid.rowIndex;
            setEditStateValue(rowid, rowIndexVlaue + 2);
        } else {
            prevRow = $("[editState=editState]");
            prevRow.attr("editState", "");
            rowid.attr("editState", "editState");
            editIndexTable = rowIndexVlaue;
            saveArrayIntoRow(prevRow);
            saveRowIntoArray(rowid);
            setEditStateValue(rowid, rowIndexVlaue + 2);
        }
    }

    function saveRowIntoArray(cureentCells) {
        $.each(ColumnData, function(index, element) {
            if (element.Editable == true) {
                var htmlVal = $($(cureentCells).children('.' + element.Name)[0]).html();
                EditRowData[element.Name] = htmlVal;
            }
        });
    }

    function setEditStateValue(td1, indexRow) {
        for (var k in EditRowData) {
            $($(td1).children('.' + k)[0]).html('<input value="' + EditRowData[k] +
                '" class="userinput"  style="width: 99% " />');
        }
    }
</script>