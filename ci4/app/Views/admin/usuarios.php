<br>
<div class="container-fluid">
    <div id="UsuariosActivos" class="bg-dark"></div>
</div>

<script type="module">
    import {
        Grid,
        h,
        html
    } from "https://unpkg.com/gridjs/dist/gridjs.production.es.min.js";

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
                    `<input id="sus${row.cells[0].data}" value="${cell}" DISABLED></input>`)
            },
            {
                id: 'IDUSER',
                name: 'Editar',
                formatter: (cell, row) => {
                    return h('button', {
                        className: 'btn btn-warning',
                        onClick: () => alert(`Editing${cell}`)
                    }, 'Editar');
                },
                sort: {
                    enabled: false
                }
            },
            {
                name: 'Eliminar',
                formatter: (cell, row) => {
                    return h('button', {
                        className: 'btn btn-danger',
                        onClick: () => alert(`Editing`)
                    }, 'Eliminar');
                },
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