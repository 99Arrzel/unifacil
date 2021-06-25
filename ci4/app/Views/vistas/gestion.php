<div class='container' style='margin-top:3em;'>
    <div class='card-columns custom-columns'>
        <?php foreach ($gestion as $zzz): ?>
        <div class='card'>
            
            <div class='card-body'>
                <h5 class='card-title' align='center'><?= $zzz?></h5>
                <p class='card text-center text-dark'>Ver material de <?= $zzz?></p>
                <br>
                <p style='text-align:center;'>
                    <a href='<?= "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] ."/". $zzz?>' class='btn btn-primary' style='align:center'>Leer</a>
                </p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>