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
                                            <option value='0'> NO SUSCRITO
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
    <button id='botonOcultar' type='button' onclick='mostrar()' class='btn btn-primary'>Mostrar de baja</button>
</div>
<!-- Modal para editar usuario -->
<div class="modal fade" id="dropEdit" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div id="myModal" class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="staticBackdropLabel">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class='table table-bordered bg-dark text-light'>
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
                                <th>Guardar</th>
                            </tr>
                        </thead>
                        <form action='/ListarUsuarios/guardar' method='post' autocomplete="off">
                            <tbody>
                                <tr>

                                    <td><input id="nombreModal" autocomplete="off" type='text' name='nombre'
                                            class='form-control'></input></td>
                                    <td><input id="apellidoModal" autocomplete="off" type='text' name='apellido'
                                            class='form-control'></input></td>
                                    <td><input id="loginModal" autocomplete="off" type='text' name='login'
                                            class='form-control'></input></td>
                                    <td><input id="emailModal" autocomplete="off" type='text' name='email'
                                            class='form-control'></input>
                                    </td>
                                    <td><input id="passwordModal" autocomplete="off" type='password' name='password'
                                            class='form-control'></input></td>
                                    <!-- SUS-->
                                    <td><select id="suscritoModal" class='form-control' name='suscrito'>
                                            <option value='1'>SUSCRITO
                                            </option>
                                            <option value='0'> NO SUSCRITO
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
                                    <td><button id="btnModal" name="btnModal" value="" type='submit'
                                            class='btn btn-success form-control'>Enviar
                                    </td>
                                </tr>
                            </tbody>
                        </form>
                    </table>
                    <h3>NOTA: Deja la contraseña en blanco a no ser que desees actualizarla</h3>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<!-- FIN de modal para insertar usuario -->
<!-- Insertar arriba -->
<br>
<div class='container-fluid'>
    <h1 class="text-center">Lista de Usuarios</h1>
    <h3 id="anuncio" class="text-center">De alta</h3>
    <div class='col-12' id="listadealta">
        <div class='table table-bordered bg-dark text-light'>
            <div class="table-responsive">
                <table class="table table-hover" id="tblUsuarios">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Login</th>
                            <th>Correo</th>
                            <th>Nivel</th>
                            <th>Suscrito</th>
                            <th>Editar</th>
                            <th>Dar de alta</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class='col-12' id="listadebaja">
        <div class='table table-bordered bg-dark text-light'>
            <div class="table-responsive">
                <table class="table table-hover" id="tblUsuariosBaja">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Login</th>
                            <th>Correo</th>
                            <th>Nivel</th>
                            <th>Suscrito</th>
                            <th>Editar</th>
                            <th>Dar de alta</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var mitab = {};
    $(document).ready(function() {
        document.title = "Usuarios de UNIFACIL";
        setTimeout(function() {
            document.getElementById("listadebaja").hidden = true;
        }, 200);

    });
    //Script para inactivos
    $(document).ready(function() {
        mitab.tablaBaja = $('#tblUsuariosBaja').DataTable({
            paging: true,
            ajax: {
                url: "https://www.proyecto3.tk//ListarUsuarios/ajaxListBaja",
                dataSrc:"",
            },
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
                    data: 'NIVEL'
                },
                {
                    data: 'SUSCRITO',
                    render: function(data) {
                        if (data == "1") {
                            return "SI";
                        } else {
                            return "NO";
                        }
                    },
                },
                {
                    data: null,
                    defaultContent: "<button class='btn btn-warning form-control' data-toggle='modal' data-target='#dropEdit'>Editar</button>",
                },
                {
                    data: 'IDUSER',
                    render: function(data) {
                        return "<button onclick='ops.re(" + data +
                            ")' class='btn btn-success form-control'>Restaurar</button>";
                    },
                },
            ],
            language: {
                "decimal": "",
                "emptyTable": "No hay datos",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(Filtro de _MAX_ total registros)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron coincidencias",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar orden de columna ascendente",
                    "sortDescending": ": Activar orden de columna desendente"
                }
            },
        });
        $('#tblUsuariosBaja tbody').on('click', 'button', function() {
            var data = mitab.tablaBaja.row($(this).parents('tr')).data();
            document.getElementById("nombreModal").value = data['NOMBRE'];
            document.getElementById("apellidoModal").value = data['APELLIDO'];
            document.getElementById("loginModal").value = data['LOGIN'];
            document.getElementById("emailModal").value = data['EMAIL'];
            document.getElementById("passwordModal").value = "";
            document.getElementById("suscritoModal").value = data['SUSCRITO'];
            document.getElementById("nivelModal").value = data['NIVELID'];
            document.getElementById("btnModal").value = data['IDUSER'];
            //data-toggle="modal" data-target="#staticBackdrop"
            //alert(data['NOMBRE'] + "id");
            console.log(data);
        });
    });
    //Script para activos
    $(document).ready(function() {
        mitab.tablaAlta = $('#tblUsuarios').DataTable({
            paging: true,
            ajax: {
                url: "https://www.proyecto3.tk//ListarUsuarios/ajaxList",
                dataSrc:"",
            },
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'copy',
                    text: 'Copiar',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                    },
                },
                {
                    extend: 'csv',
                    text: 'CSV',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                    },
                },
                {
                    extend: 'excel',
                    text: 'EXCEL',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                    },
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                    },
                },
                {
                    extend: 'print',
                    text: 'Imprimir',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                    },
                },
            ],
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
                    data: 'NIVEL'
                },
                {
                    data: 'SUSCRITO',
                    render: function(data) {
                        if (data == "1") {
                            return "SI";
                        } else {
                            return "NO";
                        }
                    },
                },
                {
                    data: null,
                    defaultContent: "<button class='btn btn-warning form-control' data-toggle='modal' data-target='#dropEdit'>Editar</button>",
                },
                {
                    data: 'IDUSER',
                    render: function(data) {
                        return "<button onclick='ops.ba(" + data +
                            ")' class='btn btn-danger form-control'>Dar de baja</button>";
                    },
                },
            ],
            language: {
                "decimal": "",
                "emptyTable": "No hay datos",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(Filtro de _MAX_ total registros)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron coincidencias",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar orden de columna ascendente",
                    "sortDescending": ": Activar orden de columna desendente"
                }
            },
        });
        $('#tblUsuarios tbody').on('click', 'button', function() {
            var data = mitab.tablaAlta.row($(this).parents('tr')).data();
            document.getElementById("nombreModal").value = data['NOMBRE'];
            document.getElementById("apellidoModal").value = data['APELLIDO'];
            document.getElementById("loginModal").value = data['LOGIN'];
            document.getElementById("emailModal").value = data['EMAIL'];
            document.getElementById("passwordModal").value = "";
            document.getElementById("suscritoModal").value = data['SUSCRITO'];
            document.getElementById("nivelModal").value = data['NIVELID'];
            document.getElementById("btnModal").value = data['IDUSER'];
            //data-toggle="modal" data-target="#staticBackdrop"
            //alert(data['NOMBRE'] + "id");
            console.log(data);
        });
    });
    ops = {
        re: function restaurar(id) {
            var formData = {
                miid: id
            };
            $.ajax({
                type: "POST",
                url: "/ListarUsuarios/restaurar",
                data: formData,
                dataType: "json",
                statusCode: {
                    500: function() {
                        alert("Error 500, chequea el script amiguito");
                    }
                },
                encode: true,
            }).done(function(resultado) {
                mitab.tablaAlta.ajax.reload();
                mitab.tablaBaja.ajax.reload();
            })
        },

        ba: function baja(id) {
            var formData = {
                miid: id
            };
            $.ajax({
                type: "POST",
                url: "/ListarUsuarios/eliminar",
                data: formData,
                dataType: "json",
                statusCode: {
                    500: function() {
                        alert("Error 500, chequea el script amiguito");
                    }
                },
                encode: true,
            }).done(function(resultado) {
                mitab.tablaAlta.ajax.reload();
                mitab.tablaBaja.ajax.reload();
            })
        },
    }


    function mostrar() {
        if (document.getElementById("botonOcultar").innerHTML == "Mostrar de baja") {
            document.getElementById("botonOcultar").innerHTML = "Mostrar de alta";
            document.getElementById("botonOcultar").className = "btn btn-success";
            document.getElementById("listadealta").hidden = true;
            document.getElementById("listadebaja").hidden = false;
            document.getElementById("anuncio").innerHTML = "De baja";
            document.title = "Usuarios de baja UNIFACIL";


        } else {
            document.getElementById("botonOcultar").innerHTML = "Mostrar de baja";
            document.getElementById("botonOcultar").className = "btn btn-primary";
            document.getElementById("listadealta").hidden = false;
            document.getElementById("listadebaja").hidden = true;
            document.getElementById("anuncio").innerHTML = "De alta";
            document.title = "Usuarios de alta UNIFACIL";
        }
    }
</script>