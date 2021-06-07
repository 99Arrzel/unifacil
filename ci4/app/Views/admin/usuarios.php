<br>
<div id="UsuariosActivos" class="bg-dark"></div>
<script type="module">
  import {
    Grid,
    h
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
        border: "3px solid #90E0EF",
        color: "#fff",
      },
      th: {
        "background-color": "#48CAE4",
        color: "black",
        "border-bottom": "3px solid #90E0EF",
        "text-align": "center",
      },
      td: {
        "background-color": "#21212c",
        color: "#fff",
        "text-align": "center",
      },
      footer: {
        "background-color": "#48CAE4",
        color: "#fff",
      },
    }
    language: {
    'search': {
      'placeholder': '🔍 Search...'
    },
    'pagination': {
      'previous': '⬅️',
      'next': '➡️',
      'showing': '😃 Displaying',
      'results': () => 'Records'
    }
  }
    //Estilos
  }).render(document.getElementById("UsuariosActivos"));
</script>