<?= json_encode($usuario)?>;
<br>
<p>XD</p>
<br>
<div id="wrapper"></div>

<script>
var datos = <?= json_encode($usuario)?>;
const grid = new Grid({
    columns: [ {id:'NOMBRE', NOMBRE:'NOMBRE'},{id:'apellido', apellido:'APELLIDO'}],
    search: true,
    data:datos,
  }).render(document.getElementById("wrapper"));
</script>