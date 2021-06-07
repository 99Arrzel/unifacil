<?= json_encode($usuario)?>
<div id="wrapper"></div>
<script>
import { Grid, html } from "https://unpkg.com/gridjs/dist/gridjs.production.min.js";


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