<div class='container' style='margin-top:3em;'>
    <div class='card-columns custom-columns'>
        <?php foreach ($ciudad as $zzz): ?>
        <div class='card'>
            <img src='assets/img/<?= $zzz?>.jpg' class='card-img-top' alt='imagen <?= $zzz?>' height='45%'>
            <div class='card-body'>
                <h5 class='card-title' align='center'><?= $zzz?></h5>
                <p class='card text-center'>Ver facultad en <?= $zzz?></p>
                <br>
                <p style='text-align:center;'>
                    <a href='/universidades/<?= $zzz?>' class='btn btn-primary' style='align:center'>Leer</a>
                </p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
