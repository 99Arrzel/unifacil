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

var datos = <?= json_encode($usuario)?>;
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
            
            id: 'NOMBRE',
            name: 'Nombre',
            formatter: (cell) => html(`<input id="nom${data: (row) => row.IDUSER} "  value="${cell}" DISABLED></input>`)
            
        },
        {
            id: 'APELLIDO',
            name: 'Apellido',
            formatter: (cell) => html(`<input value="${cell}" DISABLED></input>`)
        },
        {
            id: 'LOGIN',
            name: 'Login',
            formatter: (cell) => html(`<input value="${cell}" DISABLED></input>`)
        },
        {
            id: 'EMAIL',
            name: 'Email',
            formatter: (cell) => html(`<input value="${cell}" DISABLED></input>`)
        },
        {
            id: 'SUSCRITO',
            name: 'Suscrito',
            formatter: (cell) => html(`<input value="${cell}" DISABLED></input>`)
        },
        {
            id: 'IDUSER',
            name: 'Editar',
            formatter: (cell, row) => {
                return h('button', {
                    className: 'btn btn-warning',
                    onClick: () => alert(`Editing`)
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