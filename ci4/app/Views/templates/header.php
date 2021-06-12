<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Includes para bootstrap-->
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Boostrap CSS -->
    <!-- Boostrap Jquery & Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <!-- Boostrap Jquery & Popper -->
    <!-- Boostrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Boostrap Icons -->
    <!-- Mis Includes -->
    <link rel="stylesheet" href="https://proyecto3.tk/assets/css/style.css">
    <link rel="stylesheet" href="https://proyecto3.tk/assets/css/tabla.css">
    <!-- Mis Includes -->
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Sweet Alert -->
    <!-- DatatableszzZzZzZ  -->
    <script type="text/javascript" src="assets/datatables/datatables.js"></script>
    <!-- DatatableszzZzZzZ  -->
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Bienvenido a UNIFACIL
    </title>
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.2s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;
                </a>
                <a href="/gatoPiola">Acerca de Nosotros
                </a>
                <?php if (session()->get('nivel') == 1) {
    echo '<a href="/ListarUsuarios">Lista de Usuarios</a>';
    echo '<a href="/adm-dir">Listado Directorios</a>';
    echo '<a href="/imagen">Libro ABM</a>';
    echo '<a href="/autor">Autor ABM</a>';
    echo '<a href="/tag">TAG ABM</a>';
    echo '<a href="https://htmlpreview.github.io/?https://github.com/CraniumAdamantium/unifacil/blob/51543534c8986f1706311310880b9c2588d4ead5/stats/index.html">Reporte Visitas</a>';
    echo '<a href="/reporteusuariolibro">Reporte Libros Descargados</a>';
    echo '<a href="/reporteusuarioactivo">Reporte Usuarios Activos</a>';
    echo '<a href="/examen">Examen ABM</a>';
} elseif (session()->get('nivel') == 2) {
    echo '<a href="/imagen">Libro ABM</a>';
    echo '<a href="/autor">Autor ABM</a>';
    echo '<a href="/tag">Tags ABM</a>';
    echo '<a href="/examen">Examen ABM</a>';
}
?>
                <!--
<a href="#">Libros</a>
<a href="#">Examenes</a>
-->
                <a href="https://proyecto3.tk/contacto">Contacto
                </a>
            </div>
            <div id="main">
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;
                </span>
            </div>
            <a class="navbar-brand" href="/">UNIFACIL
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php
if (session()->get('isLoggedIn')) {
    echo '<li class="nav-item active">
<a class="nav-link" href="/perfil">Perfil <span class="sr-only">(current)</span></a>
</li>';
}
?>
                    <li class="nav-item">
                        <a class="nav-link" href="/libros_lista">Libros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/examenes_lista">Examenes
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/Universidades" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sedes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a href="https://proyecto3.tk/universidades/La%20Paz" class="dropdown-item">La Paz
                            </a>
                            <a href="https://proyecto3.tk/universidades/Cochabamba" class="dropdown-item">Cochabamba
                            </a>
                            <a href="https://proyecto3.tk/universidades/Santa%20Cruz" class="dropdown-item">Santa
                                Cruz
                            </a>
                            <!-- <a class="dropdown-item" href="#">Another action</a> -->
                            <div class="dropdown-divider">
                            </div>
                            <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                        </div>
                    </li>
                    <!--
<li class="nav-item">
<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
</li> -->
                </ul>
                <!--
<form class="form-inline my-2 my-lg-0">
<input class="form-control mr-sm-2" type="search" placeholder="Buscar algun libro..."
aria-label="Search">
<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
</form>  -->
                <ul class="navbar-nav">
                    <?php
if (!session()->get('isLoggedIn')) {
    echo '<li class="nav-item">
<a class="nav-link" href="/registrar">Registro</a>
</li>';
}
?>
                    <?php
if (!session()->get('isLoggedIn')) {
    echo '<li class="nav-item">
<a class="nav-link" href="/login">Login</a>
</li>';
}
?>
                    <?php
if (session()->get('isLoggedIn')) {
    echo '<li class="nav-item">
<a class="nav-link" href="/logout">Logout</a>
</li>';
}
?>
                </ul>
            </div>
        </nav>
        <main class="flex-fill">