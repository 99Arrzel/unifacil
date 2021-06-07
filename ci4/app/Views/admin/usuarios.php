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
    className: {
      sty = {
        table: {
          border: "3px solid #ccc",
        },
        th: {
          "background-color": "rgba(0, 0, 0, 0.1)",
          color: "#fff",
          "border-bottom": "3px solid #ccc",
          "text-align": "center",
        },
        td: {
          "text-align": "center",
        },
      };
    }

    //Estilos
  }).render(document.getElementById("UsuariosActivos"));
</script>