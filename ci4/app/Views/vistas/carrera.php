<div class='container' style='margin-top:3em;'>
    <div class='card-columns custom-columns'>
        <?php foreach ($carrera as $zzz): ?>
            <div class='card w-175 card text-white bg-dark mb-3'>
            
            <div class='card-body'>
                <h5 class='card-title' align='center'><?= $zzz?></h5>
                <p class='card text-center'>Ver en la carrera de <?= $zzz?></p>
                <br>
                <p style='text-align:center;'>
                    <a href='<?= "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] ."/". $zzz?>' class='btn btn-primary' style='align:center'>Leer</a>
                </p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>