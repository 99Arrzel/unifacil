<div class="jumbotron jumbotron-fluid">
    <h1 class="text-center display-5">LIBROS</h1>
</div>
<div class='container' style='margin-top:3em;'>
<?php if (empty($vistaLibros)) {
    echo '   
                                <div class="bg-white from-wrapper">
                                <div class="display-3" >Parece que estamos cortos en material, vuelve más tarde. </div>
                                </div></div><br>';
}
else{
?>
    <div class='card-columns custom-columns'>
        <?php foreach ($vistaLibros as $zzz): ?>
        <div class='card'>
            <div class='card-body'>
                <h5 class='card-title' align='center'><?= $zzz['NOMBRE']?>
                </h5>
                <img src="<?= $zzz['DIRIMAGEN']?>"
                    class="card-img-top"
                    alt="<?=$zzz['NOMBREIMAGEN']?>">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong> Autor(es):</strong> <?= $zzz['AUTORES']?>
                    </li>
                    <li class="list-group-item"><strong>Edición:</strong> <?= $zzz['EDICION']?>
                    </li>
                    <li class="list-group-item"><strong>AÑO:</strong> <?= $zzz['AÑO']?>
                    </li>
                    <a href='<?= $zzz['DIRLIBRO']?>'
                        class='btn btn-primary' style='align:center'>Leer</a>
                </ul>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php } ?>
<!-- =================================== -->
<div class="jumbotron jumbotron-fluid">
    <h1 class="text-center display-5">EXAMENES</h1>
</div>
<div class='container' style='margin-top:3em;'>
<?php if (empty($vistaExamenes)) {
    echo '   
                                <div class="bg-white from-wrapper">
                                <div class="display-3" >Parece que estamos cortos en material, vuelve más tarde. </div>
                                </div></div><br>';
}
else{
?>
    <div class='card-columns custom-columns'>
        <?php foreach ($vistaExamenes as $zzz): ?>

        <div class='card'>
            <div class='card-body'>
                <h5 class='card-title' align='center'><?= $zzz['NOMBRE']?>
                </h5>
                <img src="<?= $zzz['DIRIMAGEN']?>"
                    class="card-img-top"
                    alt="<?=$zzz['NOMBREIMAGEN']?>">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong> Autor(es):</strong> <?= $zzz['AUTOR']?>
                    </li>
                    <li class="list-group-item"><strong>Paralelo:</strong> <?= $zzz['PARALELO']?>
                    </li>
                    <li class="list-group-item"><strong>AÑO:</strong> <?= $zzz['AÑO']?>
                    </li>
                    <a href='<?= $zzz['DIREXAMEN']?>'
                        class='btn btn-primary' style='align:center'>Leer</a>
                </ul>
            </div>
        </div>
    
        <?php endforeach; ?>
    </div>
</div>
<?php } ?>