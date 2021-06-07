<?= json_encode($usuario)?>
<br>
<div id="XD" class="container-fluid">
    <div id="UsuariosActivos" class="bg-dark"></div>
</div>

<script type="module">
    import {
        Grid,
        h,
        html
    } from "https://unpkg.com/gridjs/dist/gridjs.production.es.min.js";
    //=======================
    var datos = <?= json_encode($usuario)?> ;
    //Cambio la variable 1 a suscrito y 0 a no suscrito
    for (var i = 0; i < datos.length; i++) {
        if (datos[i].SUSCRITO === "1") {
            datos[i].SUSCRITO = "SUSCRITO";
        } else {
            datos[i].SUSCRITO = "NO SUSCRITO";
        }
    }
    new gridjs.Grid({
        columns: [{
                id: 'IDUSER',
                name: 'ID',
                hidden: true,
            },
            {
                id: 'NOMBRE',
                name: 'Nombre',
                formatter: (cell, row) => html(
                    `<input id="nom${row.cells[0].data}" value="${cell}" DISABLED></input>`)
            },
            {
                id: 'APELLIDO',
                name: 'Apellido',
                formatter: (cell, row) => html(
                    `<input id="ape${row.cells[0].data}" value="${cell}" DISABLED></input>`)
            },
            {
                id: 'LOGIN',
                name: 'Login',
                formatter: (cell, row) => html(
                    `<input id="log${row.cells[0].data}" value="${cell}" DISABLED></input>`)
            },
            {
                id: 'EMAIL',
                name: 'Email',
                formatter: (cell, row) => html(
                    `<input id="ema${row.cells[0].data}" value="${cell}" DISABLED></input>`)
            },
            {
                id: 'SUSCRITO',
                name: 'Suscrito',
                formatter: (cell, row) => html(
                    `<button class="btn btn-info" onclick="sus${row.cells[0].data}"> ${cell}</button>`)
            },
            {
                id: 'NIVEL',
                name: 'Nivel',
                formatter: (cell, row) => html(
                    `<input id="niv${row.cells[0].data}" value="${cell}" DISABLED></input>`)
            },
            {
                name: 'Editar',
                formatter: (cell, row) => html(
                    `<button id="bttnEditar${row.cells[0].data}" class="btn btn-warning" onclick="editar(${row.cells[0].data})">Editar</button>`
                ),

                sort: {
                    enabled: false
                }
            },
            {
                name: 'Eliminar',
                formatter: (cell, row) => html(
                    `<button id="bttnEliminar${row.cells[0].data}" class="btn btn-danger" onclick="eliminar(${row.cells[0].data})">Eliminar</button>`
                ),

                sort: {
                    enabled: false
                }
            },
        ],
        search: true,
        data: datos,
        sort: true,
        pagination: {
            limit: 10
        },
        resizable: true,
        style: {
            table: {
                border: "3px solid #99ff99",
                color: "#fff",
            },
            th: {
                "background-color": "#99ff99",
                color: "black",
                "border-bottom": "3px solid #99ff99",
                "text-align": "center",
            },
            td: {
                "background-color": "#21212c",
                color: "#fff",
                "text-align": "center",
            },
            footer: {
                "background-color": "#99ff99",
                color: "#fff",
            },
        },
        language: {
            'search': {
                'placeholder': 'Buscar algo... 🔍'
            },
            'pagination': {
                'previous': '⬅️',
                'next': '➡️',
                'showing': 'Mostrando',
                'results': () => 'Resultados',
                'of': 'de',
                'to': 'de'
            }
        }
        //Estilos
    }).render(document.getElementById("UsuariosActivos"));
</script>
<script>
    function editar(id) {
        if (document.getElementById("bttnEditar" + id).innerHTML == "Guardar") {
            var formData = {
                miid: id,
                nombre: document.getElementById("nom" + id).value,
                apellido: document.getElementById("ape" + id).value,
                login: document.getElementById("log" + id).value,
                email: document.getElementById("ema" + id).value,
                nivel: "3",

            };
            $.ajax({
                type: "POST",
                url: "/ListarUsuarios/guardar",
                data: formData,
                dataType: "json",
                statusCode: {
                    500: function() {
                        alert(formData);
                    }
                },
                encode: true,
            }).done(function(resultado) {
                if (resultado.exists == true) {
                    swal("Guardado con sssexito");
                } else {
                    swal("Error al guardar");
                }
            });
            //event.preventDefault(); no es type submit
        }
        if (document.getElementById("bttnEditar" + id).innerHTML == "Editar") {
            document.getElementById("bttnEditar" + id).innerHTML = "Guardar";
            document.getElementById("bttnEditar" + id).className = "btn btn-success form-control";
            document.getElementById("nom" + id).disabled = false;
            document.getElementById("ape" + id).disabled = false;
            document.getElementById("log" + id).disabled = false;
            document.getElementById("ema" + id).disabled = false;
            document.getElementById("niv" + id).disabled = false;
        } else {
            document.getElementById("bttnEditar" + id).innerHTML = "Editar";
            document.getElementById("bttnEditar" + id).className = "btn btn-warning form-control";
            document.getElementById("nom" + id).disabled = true;
            document.getElementById("ape" + id).disabled = true;
            document.getElementById("log" + id).disabled = true;
            document.getElementById("ema" + id).disabled = true;
            document.getElementById("niv" + id).disabled = true;
        }
    }

    function eliminar(id) {
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
            $("#UsuariosActivos").reload; //Reload altas
            //$("#recargarTablaBaja").load(window.location.href + " #recargarTablaBaja"); //Reload bajas
            if (resultado.baja == true) {
                swal("Usuario dado de baja");
            } else {
                swal("Fallo al dar de baja");
            }
        })
    }
</script>