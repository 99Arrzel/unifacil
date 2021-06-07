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
<div class="container-fluid">
    <div id="UsuariosActivos" class="bg-dark"></div>
</div>

<script type="module">
var datos = <?= json_encode($usuario)?>;
var openIcon = function(value, data, cell, row, options){ //plain text value
    return "<i class='fa fa-search'></i>"
};

var table = new Tabulator("#UsuariosActivos", {
    data:datos, //assign data to table
    layout:"fitColumns",      //fit columns to width of table
    responsiveLayout:"hide",  //hide columns that dont fit on the table
    tooltips:true,            //show tool tips on cells
    addRowPos:"top",          //when adding a new row, add it to the top of the table
    history:true,             //allow undo and redo actions on the table
    pagination:"local",       //paginate the data
    paginationSize:7,         //allow 7 rows per page of data
    movableColumns:true,      //allow column order to be changed
    resizableRows:true,       //allow row order to be changed
    initialSort:[             //set the initial sort order of the data
        {column:"NOMBRE", dir:"asc"},
    ],
    columns:[                 //define the table columns
        {title:"Nombre", field:"NOMBRE", editor:"input"},
        {title:"Apellido", field:"APELLIDO", editor:"input"},
        {title:"Login", field:"LOGIN", width:95, editor:"select", editorParams:{values:["male", "female"]}},
        {title:"Email", field:"EMAIL", editor:"input"},
        {title:"Nivel", field:"NIVEL", editor:"select", editorParams:{values:["Admin", "Publisher", "Usuario"]}},
        {title:"Suscrito", field:"SUSCRITO",  formatter:"tickCross", sorter:"boolean", editor:true},
        {title:"" , sortable:false, formatter:openIcon, onClick:function(e, cell, value, data){
            loadDialog(data);
        }},
    ],


});
</script>