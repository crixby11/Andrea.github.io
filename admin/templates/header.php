<?php
session_start();
$url_base="http://localhost/Proyecto/admin/";

if(!isset($_SESSION['usuario'])){
    header("Location:".$url_base."login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Administrador | Ceutec Eventos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <!-- place navbar here -->

        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="nav navbar-nav">
                <a class="nav-item nav-link active" href="<?php echo $url_base;?>index.php/">Bienvenida<span
                        class="visually-hidden">(current)</span></a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/servicios/">Eventos</a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/portafolio/">Viajes</a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/entradas/">Informacion</a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/equipo/">Academicos</a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/configuraciones/">Configuraciones</a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/usuarios/">Usuarios</a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/tablaeventos">Todos los eventos</a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/calendario/dynamic-full-calendar.html">Calendario</a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>cerrar.php">Cerrar Sesion</a>


            </div>
        </nav>

    </header>
    <main class="container">
        <br/>