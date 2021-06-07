<div id="wrapper"></div>

<script>
var datos = <?= json_encode($usuario)?>;
const grid = new Grid({
    columns: [ {id:'nombre', nombre:'NOMBRE'},{id:'apellido', apellido:'APELLIDO'}],
    search: true,
    data:datos,
  }).render(document.getElementById("wrapper"));
</script>