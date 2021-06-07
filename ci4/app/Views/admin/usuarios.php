<br>
<div class="container-fluid">
    <div id="UsuariosActivos" class="bg-dark"></div>
</div>

<script type="module">
var datos = <?= json_encode($usuario)?>;
var table = new Tabulator("#example-table", {
    data:datos, //assign data to table
    autoColumns:true, //create columns from data field names
});
</script>