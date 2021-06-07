<div id="wrapper"></div>

<script>
var datos = <?= json_encode($usuario);
new gridjs.Grid({
    data:datos,
    columns: [ {data:'NOMBRE'},{data:'APELLIDO'}],
    search: true,
  }).render(document.getElementById("wrapper"));
</script>