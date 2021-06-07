<br>
<div class="container-fluid">
    <div id="UsuariosActivos" class="bg-dark"></div>
</div>

<script type="module">
import {
    Grid,
    h
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
            name: 'Nombre'
        },
        {
            id: 'APELLIDO',
            name: 'Apellido'
        },
        {
            id: 'LOGIN',
            name: 'Login'
        },
        {
            id: 'EMAIL',
            name: 'Email'
        },
        {
            id: 'SUSCRITO',
            name: 'Suscrito'
        },
        {
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
            border: "3px solid #FFFFFF",
            color: "#fff",
        },
        th: {
            "background-color": "#FFFFFF",
            color: "black",
            "border-bottom": "3px solid #FFFFFF",
            "text-align": "center",
        },
        td: {
            "background-color": "#21212c",
            color: "#fff",
            "text-align": "center",
        },
        footer: {
            "background-color": "#FFFFFF",
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