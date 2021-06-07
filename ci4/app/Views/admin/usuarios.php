
<?= json_encode($usuario)?>
<div id="wrapper"></div>
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
      }],
    search: true,
    data:datos,
  }).render(document.getElementById("wrapper"));
</script>