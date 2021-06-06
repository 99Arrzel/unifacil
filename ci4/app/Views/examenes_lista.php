<body>
  <br>
    <?php if(!empty($examenes)):?> <!-- OK--------------------->
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-dark table-hover table-bordered table-striped table-sm">
                        <tr>
                            <th>Nombre</th>
                            <th>Año</th>
                            <th>Paralelo</th>
                            <th>Direccion</th>
                            <th>Autor</th>
                            <th>Preview</th>
                        </tr>
                         <?php foreach ($examenes as $examen):?>
                        <tbody>
                        <tr>
                            <td><?= $examen->nombreExamen;?></td>
                            <td><?= $examen->year;?></td>
                            <td><?= $examen->paralelo;?></td>
                            <td> <a href="<?= $examen->dirDoc;?>">Enlace</a></td>
                            <td><?= $examen->nombreAutor;?></td>
                            <td class="w-25"><img src="<?= $examen->dirImagen;?>" class="img-fluid" class="mx-auto d-block"></td>
                        </tr>
                        </tbody>
                        <?php endforeach; ?>    
                    </table>
                </div>
            </div>
        </div>
    <?php else:?>
        <h1>No hay examenes que mostrar, por favor contacte a soporte para informar el error</h1>
    <?php endif;?> <!-- OK--------------------->
 
</body>
<footer>
<hr>
<a class="nav-link" href="/contacto">Contactanos si tienes alguna sugerencia o algun problema<span class="sr-only">(current)</span></a>
</footer>
