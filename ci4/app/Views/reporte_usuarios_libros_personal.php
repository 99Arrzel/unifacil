
    <?php 
           // header('Location: http://proyecto3.tk/');
             $name = session()->get('nombreUsuario');
        
        
        ?>
<body>
    <div class="container">
        <h1>Historial de Libros Descargados</h1>
        <?php //print_r($libro);?>
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered table-dark" id="reporteusuariolibro">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Usuario</th><!-- ward:  $id= session()->get('idtblUsuario'); echo $id  -->
                            <th>Email</th>
                            <th>Fecha y Hora</th>
                            <th>Nombre del Libro</th>
                            <th>Enlace</th>
                        </tr>
                        <tr>
                        <?php foreach ($usuario as $key): ?>
                        <?php if (($key['nombreUsuario'])==$name): ?>
                            <td><?php echo $key['nombreUsuario']?></td>
                            <td><?php echo $key['apellido']?></td>
                            <td><?php echo $key['login']?></td>
                            <td><?php echo $key['email']?></td>
                            <td><?php echo $key['fecha']?></td>
                            <td><?php echo $key['nombreLibro']?></td>
                            <td><a href="<?php echo $key['dirDoc']?>">Enlace</a></td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>                     

    </div>
</body>

<div class="buttonContainer">
    <button class="btn btn-primary" onclick="generate()">Descargar PDF</button>
    <button id="btnExport" class="btn btn-success" onclick="fnExcelReport();">Descargar Excel</button>
</div>

<script type="text/javascript">
    function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('reporteusuariolibro'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
  

  </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>  

<script type="text/javascript">  
function generate() {  
    var doc = new jsPDF('p', 'pt', 'letter');  
    var htmlstring = '';  
    var tempVarToCheckPageHeight = 0;  
    var pageHeight = 0;  
    pageHeight = doc.internal.pageSize.height;  
    specialElementHandlers = {  
        // element with id of "bypass" - jQuery style selector  
        '#bypassme': function(element, renderer) {  
            // true = "handled elsewhere, bypass text extraction"  
            return true  
        }  
    };  
    margins = {  
        top: 150,  
        bottom: 60,  
        left: 30,  
        right: 30,  
        width: 600  
    };  
    var y = 20;  
    doc.setLineWidth(2);  
    doc.text(200, y = y + 30, "REPORTE DE LIBROS DESCARGADOS");  
    doc.autoTable({  
        html: '#reporteusuariolibro', 
        startY: 70,  
        theme: 'striped',  
        columnStyles: {  
            0: {  
                cellWidth: 60,  
            },  
            1: {  
                cellWidth: 60,  
            },  
            2: {  
                cellWidth: 60,  
            },
            3: {
                cellWidth: 60,
            },
            4: {
                cellWidth: 90,
            }
            ,
            5: {
                cellWidth: 90,
            },
            6: {
                cellWidth: 90,
            }        
        },  
        styles: {  
            minCellHeight: 40  
        }  
    })  
    doc.save('Reporte_Libros_Descargados.pdf');  
}  
</script>  