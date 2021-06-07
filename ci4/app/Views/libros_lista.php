<body>
  <br><!-- Borré lo que copiaste con navbar y lo invoque en el controlador--------------------->
    <?php if(!empty($libros)):?> <!-- OK--------------------->
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-dark table-hover table-bordered table-striped table-sm">
                        <tr>
                            <th>Nombrezzzzzzzzzzz</th>
                            <th>Año</th>
                            <th>Edicion</th>
                            <th>Direccion</th>
                            <th>Portada</th>
                        </tr>
                         <?php foreach ($libros as $libro):?>
                        <tbody>
                        <tr>
                            <td><?= $libro->nombreLibro;?></td>
                            <td><?= $libro->year;?></td>
                            <td><?= $libro->edicion;?></td>
                            <td> <a href="<?= $libro->dirDoc;?>">Enlace</a></td>
                            <td class="w-25"><img src="<?= $libro->dirImagen;?>" class="img-fluid" class="mx-auto d-block"></td>
                        </tr>
                        </tbody>
                        <?php endforeach; ?>    
                    </table>
                </div>
            </div>
        </div>
    <?php else:?>
        <h1>No hay libros que mostrar, por favor contacte a soporte para informar el error</h1>
    <?php endif;?> <!-- OK--------------------->
 
</body>
<footer>
<hr>
<a class="nav-link" href="/contacto">Contactanos si tienes alguna sugerencia o algun problema<span class="sr-only">(current)</span></a>
</footer>
