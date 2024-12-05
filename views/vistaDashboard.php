<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo get_urlBase('css/diseñodashboard.css') ?>">
</head>

<body>
    <div class="menu">
        <h1>BIENVENIDO AL SISTEMA</h1>
    </div>
    <div class="main">
        <div class="menu">
            <h3 style="color: blue; font-family: Arial, sans-serif; text-shadow: 2px 2px 4px #000000;">Este es el menú</h3>
            <ul>
                <li><a href="?opcion=inicio">Inicio</a></li>
                <li><a href="?opcion=ver">Ver</a></li>
                <li><a href="?opcion=ingresar">Ingresar</a></li>
                <li><a href="?opcion=modificar">Modificar</a></li>
                <li><a href="?opcion=eliminar">Eliminar</a></li>
                <li><a href="<?php echo get_controllers('logout.php') ?>">Salir</a></li>
            </ul>
        </div>
        <div class="contenido">
            <?php
            if (isset($contenido)) {
                echo $contenido;
            } else {
                echo "<h2>Contenido Principal</h2>";
            }
            ?>
        </div>
    </div>
</body>

</html>