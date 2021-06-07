<body>
  <br><!-- Borré lo que copiaste con navbar y lo invoque en el controlador--------------------->
    <?php if(!empty($examenes)):?> <!-- OK--------------------->
        <div class="jumbotron jumbotron-fluid">
            <h1 class="text-center display-5">EXAMENES</h1>
        </div>
        <div class='container' style='margin-top:3em;'>
            <div class='card-columns custom-columns'>
            <?php foreach ($examenes as $examen): ?>
                <div class='card bg-dark'>
                    <div class='card-body'>
                     <h5 class='card-title text-white' align='center'><?= $examen->nombreExamen;?></h5>
                     <img src="<?=$examen->dirImagen;?>" class="card-img-top" alt="portada examen">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong class="text-dark">Autor(es):</strong><?= $examen->nombreAutor?></li>
                        <li class="list-group-item"><strong class="text-dark">Paralelo:</strong><?= $examen->paralelo?></li>
                        <li class="list-group-item"><strong class="text-dark">AÑO:</strong><?= $examen->year ?></li>
                        <a href="#" class="btn btn-accent-b btn-sm m-1 text-white">#<span itemprop="keywords"><?= $examen->tags ?></span></a>
                        <a href="<?= $examen->dirDoc;?>" class='btn btn-light' style='align:center'>Leer</a>
                      </ul>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>                    

    <?php else:?>
        <h1>No hay examenes que mostrar, por favor contacte a soporte para informar el error</h1>
    <?php endif;?> <!-- OK--------------------->
 
</body>
<footer>
<hr>
<a class="nav-link" href="/contacto">Contactanos si tienes alguna sugerencia o algun problema<span class="sr-only">(current)</span></a>
</footer>      <!--<div class="row">
  
