<?= json_encode($usuario)?>;
<br>
<p>XD</p>
<br>
<div id="wrapper"></div>

<script>
var datos = <?= json_encode($usuario)?>;
const grid = new Grid({
    
    search: true,
    data:datos,
  }).render(document.getElementById("wrapper"));
</script>