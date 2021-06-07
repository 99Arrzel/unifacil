<div id="wrapper"></div>

<script>
var datos = <?= json_encode($usuario)?>;
new gridjs.Grid({
    search: true,
    data:datos,
  }).render(document.getElementById("wrapper"));
</script>