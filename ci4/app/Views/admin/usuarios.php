<br>
<div class="container-fluid">
    <div id="UsuariosActivos" class="bg-dark"></div>
</div>

<script type="module">
var datos = <?= json_encode($usuario)?>;
var table = new Tabulator("#UsuariosActivos", {
    data:datos, //assign data to table
    layout:"fitColumns",      //fit columns to width of table
    responsiveLayout:"hide",  //hide columns that dont fit on the table
    tooltips:true,            //show tool tips on cells
    addRowPos:"top",          //when adding a new row, add it to the top of the table
    history:true,             //allow undo and redo actions on the table
    pagination:"local",       //paginate the data
    paginationSize:7,         //allow 7 rows per page of data
    movableColumns:true,      //allow column order to be changed
    resizableRows:true,       //allow row order to be changed
    initialSort:[             //set the initial sort order of the data
        {column:"NOMBRE", dir:"asc"},
    ],
    columns:[                 //define the table columns
        {title:"Nombre", field:"NOMBRE", editor:"input"},
        {title:"Apellido", field:"APELLIDO", editor:"input"},
        {title:"Login", field:"LOGIN", width:95, editor:"select", editorParams:{values:["male", "female"]}},
        {title:"Email", field:"EMAIL", editor:"input"},
        {title:"Nivel", field:"NIVEL", editor:"select", editorParams:{values:["Admin", "Publisher", "Usuario"]}},
        {title:"Suscrito", field:"SUSCRITO",  formatter:"tickCross", sorter:"boolean", editor:true},
    ],


});
</script>