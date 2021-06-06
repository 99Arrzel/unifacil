<div class='container' style='margin-top:3em;'>
    <div class='card-columns custom-columns'>
        <?php foreach ($semestre as $zzz): ?>
        <div class='card'>
            
            <div class='card-body'>
                <h5 class='card-title' align='center'><?= $zzz?> semestre</h5>
                <p class='card text-center'>Ver material en el <?= $zzz?> semestre</p>
                <br>
                <p style='text-align:center;'>
                    <a href='<?= "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] ."/". $zzz?>' class='btn btn-primary' style='align:center'>Leer</a>
                </p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>