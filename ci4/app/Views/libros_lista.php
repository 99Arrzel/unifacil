<body>
  <br><!-- Borré lo que copiaste con navbar y lo invoque en el controlador--------------------->
    <?php if(!empty($libros)):?> <!-- OK--------------------->
        <!--<div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-dark table-hover table-bordered table-striped table-sm">
                        <tr>
                            <th>Nombre</th>
                            <th>Año</th>
                            <th>Edicion</th>
                            <th>Direccion</th>
                            <th>Autor(es)</th>
                            <th>Tag(s)</th>
                            <th>Portada</th>
                        </tr>
                         <?php //foreach ($libros as $libro):?>
                        <tbody>
                        <tr>
                            <td><?= //$libro->nombreLibro;?></td>
                            <td><?= //$libro->year;?></td>
                            <td><?= //$libro->edicion;?></td>
                            <td> <a href="<?= //$libro->dirDoc;?>">Enlace</a></td>
                            <td><?= //$libro->autores ?></td>
                            <td><?= //$libro->tags ?></td>
                            <td class="w-25"><img src="<?= //$libro->dirImagen;?>" class="img-fluid" class="mx-auto d-block"></td>
                        </tr>
                        </tbody>
                        <?php// endforeach; ?>    
                    </table>
                </div>
            </div>
        </div> -->

        <div class="jumbotron jumbotron-fluid">
            <h1 class="text-center display-5">LIBROS</h1>
        </div>
        <?php foreach ($libros as $libro): ?>
        <div class='container' style='margin-top:3em;'>
            <div class='card-columns custom-columns'>
                <div class='card'>
                    <div class='card-body'>
                    <h5 class='card-title' align='center'><?= $libro->nombreLibro;?></h5>
                    <img src="<?=$libro->dirImagen;?>" class="card-img-top" alt="portada libro">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Autor(es):</strong><?= $libro->autores?></li>
                        <li class="list-group-item"><strong>Edición:</strong><?= $libro->edicion?></li>
                        <li class="list-group-item"><strong>AÑO:</strong><?= $libro->year ?></li>
                        <a href="#" class="btn btn-accent-b btn-sm m-1">#<span itemprop="keywords"><?= $libro->tags ?></span></a>
                        <a href="<?= $libro->dirDoc;?>" class='btn btn-primary' style='align:center'>Leer</a>
                    </ul>
                </div>
            </div>
            </div>
        </div>                    
        <?php endforeach; ?>

    <?php else:?>
        <h1>No hay libros que mostrar, por favor contacte a soporte para informar el error</h1>
    <?php endif;?> <!-- OK--------------------->
 
</body>
<footer>
<hr>
<a class="nav-link" href="/contacto">Contactanos si tienes alguna sugerencia o algun problema<span class="sr-only">(current)</span></a>
</footer>
