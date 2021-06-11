<?php if (session()->get('nivel') > 2)
        {
            header('Location: http://proyecto3.tk/');
        }?>

<div class="container">
<h3>Ahora debes agregar un autor o si ya esta en la lista, puedes continuar o poner desconocido</h3>
    <h1>ABM Autor</h1>
    <div class="row">
        <div class="col-sm-12">
            <form action="<?php echo base_url().'/crearAutor'?>" method="POST">
                <label>Autor</label>
                <input type="text" name="nombreAutor" id="nombreAutor" class="form-control">
                <select name="estado" id="estado" class="form-control" required>
                        <option selected>seleccione un estado</option>
                        <option value="0">Activo</option>
                        <option value="1">Inactivo</option>
                </select>
                <br>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
    <?php /*if (session()->get('exitoso')): ?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('exitoso') 
        </div> */?>

        <?php // endif; ?>
        <br>
        <h2>Listado de Autores</h2>
        <?php //print_r($datos);?>
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered table-dark" id="styledTable">
                        <tr>
                            <th>Autor</th>
                            <th>Estado</th>
                            <th>Editar</th>
                        </tr>
                        <?php foreach ($datos as $key): ?>
                        <?php if(($key->estado)==0): ?>
                        <tr>
                            <td><?php echo $key->nombreAutor ?>
                            </td>
                            <td><?php echo $key->estado ?></td>
                            <td>
                                <a href="<?php echo base_url().'/obtenerNombreAutor/'.$key->idtblAutor //basicamente obtiene el id para poder hace el update?>"
                                    class="btn btn-warning btn-small">Editar</a>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>

        <h2>Listado de Autores Eliminados</h2>
        <?php //print_r($datos);?>
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered table-dark">
                        <tr>
                            <th>Autor</th>
                            <th>Estado</th>
                            <th>Editar</th>
                        </tr>
                        <?php foreach ($datos as $key): ?>
                            <?php if(($key->estado)==1): ?>
                        <tr>
                            <td><?php echo $key->nombreAutor ?>
                            </td>
                            <td><?php echo $key->estado ?></td>
                            <td>
                                <a href="<?php echo base_url().'/obtenerNombreAutor/'.$key->idtblAutor //basicamente obtiene el id para poder hace el update?>"
                                    class="btn btn-warning btn-small">Editar</a>
                            </td>
                        </tr>
                        <?php endif;?> 
                        <?php endforeach; ?>
                    </table>
                </div>

            </div>
        </div>
    <a class="btn btn-primary btn-lg btn-block" href="/tag" role="button">Continuar a Tags</a>

    <div class="buttonContainer">
        <button class="btn" id="docRaptor" onclick="downloadPDFWithDocRaptor()">Export PDF with DocRaptor</button>
        <button class="btn" id="pdfmake" onclick="downloadPDFWithPDFMake()">Export PDF with pdfmake</button>
        <button class="btn" id="jsPDF" onclick="downloadPDFWithjsPDF()">Export PDF with jsPDF</button>
        <button class="btn" id="browserPrint" onclick="downloadPDFWithBrowserPrint()">Export PDF with browser print</button>
        <p id="styledHeaderLink">See a similar page but with a <a href="styled-header.html">fancy styled header</a>.</p>
      </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
    //sweet alert para que se vea mas bonito
    </script>

  
    <!-- For DocRaptor -->
    <script src="scripts/docraptor.1.0.0.js"></script>

    <!-- For pdfmake -->
    <script src="scripts/pdfmake.0.1.68.min.js"></script>
    <script src="scripts/pdfmake.vfs_fonts.0.1.68.min.js"></script>
    
    <!-- For jsPDF -->
    <script src="scripts/html2canvas.1.0.0-rc.7.js"></script>
    <script src="scripts/dompurify.2.2.0.min.js"></script>
    <script src="scripts/jspdf.2.1.1.umd.min.js"></script>

    <!-- PDF export methods I wrote using the libraries above -->
    <script type="text/javascript">
    
    // START: DocRaptor
function downloadPDFWithDocRaptor() {
  DocRaptor.createAndDownloadDoc('YOUR_API_KEY_HERE', {
    test: true, // test documents are free, but watermarked
    type: 'pdf',
    name: 'MLB World Series Winners',
    document_content: document.querySelector('html').innerHTML,
  })
}

document.querySelector('#docRaptor').addEventListener('click', downloadPDFWithDocRaptor);
// END: DocRaptor


// START: pdfmake
function downloadPDFWithPDFMake() {
  var tableHeaderText = [...document.querySelectorAll('#styledTable thead tr th')].map(thElement => ({ text: thElement.textContent, style: 'tableHeader' }));

  var tableRowCells = [...document.querySelectorAll('#styledTable tbody tr td')].map(tdElement => ({ text: tdElement.textContent, style: 'tableData' }));
  var tableDataAsRows = tableRowCells.reduce((rows, cellData, index) => {
    if (index % 4 === 0) {
      rows.push([]);
    }

    rows[rows.length - 1].push(cellData);
    return rows;
  }, []);

  var docDefinition = {
    header: { text: 'MLB World Series Winners', alignment: 'center' },
    footer: function(currentPage, pageCount) { return ({ text: `Page ${currentPage} of ${pageCount}`, alignment: 'center' }); },
    content: [
      {
        style: 'tableExample',
        table: {
          headerRows: 1,
          body: [
            tableHeaderText,
            ...tableDataAsRows,
          ]
        },
        layout: {
          fillColor: function(rowIndex) {
            if (rowIndex === 0) {
              return '#0f4871';
            }
            return (rowIndex % 2 === 0) ? '#f2f2f2' : null;
          }
        },
      },
    ],
    styles: {
      tableExample: {
        margin: [0, 20, 0, 80],
      },
      tableHeader: {
        margin: 12,
        color: 'white',
      },
      tableData: {
        margin: 12,
      },
    },
  };
  pdfMake.createPdf(docDefinition).download('MLB World Series Winners');
}

document.querySelector('#pdfmake').addEventListener('click', downloadPDFWithPDFMake);
// END: pdfmake


// START: jsPDF
function downloadPDFWithjsPDF() {
  var doc = new jspdf.jsPDF('p', 'pt', 'a4');

  doc.html(document.querySelector('#styledTable'), {
    callback: function (doc) {
      doc.save('MLB World Series Winners.pdf');
    },
    margin: [60, 60, 60, 60],
    x: 32,
    y: 32,
  });
}

document.querySelector('#jsPDF').addEventListener('click', downloadPDFWithjsPDF);
// END: jsPDF


// START: browser print (native functionality, right-click >> Print (or Command + P))
function downloadPDFWithBrowserPrint() {
  window.print();
}
document.querySelector('#browserPrint').addEventListener('click', downloadPDFWithBrowserPrint);
// END: browser print
    
    </script>

    <script type="text/javascript">
    //muestra un alert si todo va bien
    let mensaje = "<?php echo $mensaje ?>";
    if (mensaje == '1') {
        swal('😎', 'Agregado con exito', 'success'); //alert("Agregado con exito");
    } else if (mensaje == '0') {
        swal('😑 ', 'Error en la insercion', 'error'); //alert("No se agrego, error en la insercion");    
    } else if (mensaje == '2') {
        swal('😀', 'Actualizado con exito', 'success');
    } else if (mensaje == '3') {
        swal('😧 ', 'Error al actualizar', 'error');
    } else if (mensaje == '4') {
        swal('😈', 'Eliminado con exito', 'success');
    } else if (mensaje == '5') {
        swal('🤡', 'Error al eliminar', 'error');
    }
    </script>