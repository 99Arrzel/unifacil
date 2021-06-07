<?= json_encode($usuario)?>
<div id="UsuariosActivos"></div>

<script type="module">
  import {
    Grid,
    h
  } from "https://unpkg.com/gridjs/dist/gridjs.production.es.min.js";

  var datos = <?= json_encode($usuario)?> ;
  //Cambio la variable 1 a suscrito y 0 a no suscrito
  for(var i = 0; i < datos.length; i++)
  {
    if(datos[i].SUSCRITO === "1"){
      datos[i].SUSCRITO = "SUSCRITO";
    }
    if(datos[i].SUSCRITO === "0"){
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
        id: 'CONTRASEÑA',
        name: 'Password'
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
        }
      },
      {
        name: 'Eliminar',
        formatter: (cell, row) => {
          return h('button', {
            className: 'btn btn-danger',
            onClick: () => alert(`Editing`)
          }, 'Eliminar');
        }
      },
    ],
    search: true,
    data: datos,
    sort: true,
  }).render(document.getElementById("UsuariosActivos"));
</script>