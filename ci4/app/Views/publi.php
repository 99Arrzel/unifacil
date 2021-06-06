<?php if (session()->get('nivel') != 1) {
    header('Location: http://proyecto3.tk/');
}?>
<body>
    <div class="container">
        <h3>Bienvenido para insertar un libro primero debes insertar una imagen</h3>
        <a class="btn btn-primary" href="/libro" role="button">Continuar a Libros</a>
    </div>
</body>