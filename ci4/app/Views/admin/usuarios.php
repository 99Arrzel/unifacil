<?= json_encode($usuario)?>
<div id="wrapper"></div>
<script type="module">
  import {
    Grid,
    html,
    h
  } from "https://unpkg.com/gridjs/dist/gridjs.production.es.min.js";
</script>
<script>
var datos = <?= json_encode($usuario)?>;
new gridjs.Grid({
    columns:[
      {
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
        formatter:(cell, row) => {
          return h('button',{
            className: 'btn btn-danger',
            onClick:() => alert(`Editing`)
          }, 'Editar');
        }
      },
      ],
    search: true,
    data:datos,
    sort:true,
  }).render(document.getElementById("wrapper"));
</script>