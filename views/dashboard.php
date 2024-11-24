<?php

session_start();

if (!isset($_SESSION["txtusername"])) {
    header('location: ' . get_UrlBase('index.php'));
    exit();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo get_UrlBase('css/diseñodashboard.css') ?>">
    <style>
        .container {
            display: flex;
        }

        .menu {
            width: 200px;
            background-color: #f4f4f4;
            padding: 10px;
        }

        .contenido {
            flex-grow: 1;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="menu">
                <h3 style="color: blue; font-family: Arial, sans-serif;">Este es el menú</h3>
                <ul>
                    <li><a href="?opcion=inicio">Inicio</a></li>
                    <li><a href="?opcion=ver">Ver</a></li>
                    <li><a href="?opcion=ingresar">Ingresar</a></li>
                    <li><a href="?opcion=modificar">Modificar</a></li>
                    <li><a href="?opcion=eliminar">Eliminar</a></li>
                    <li><a href="<?php echo get_UrlBase('controllers/logout.php') ?>">Salir</a></li>
                </ul>
            </div>

            <div class="contenido">
                <?php
                if (isset($_GET["opcion"])) {
                    $opcion = $_GET["opcion"];

                    switch ($opcion) {
                        case 'inicio':
                            echo "<h1>BIENVENIDO AL SISTEMA</h1>";
                            break;
                        case 'ver':
                            echo "<iframe src='" . get_controllers("controladorUsuario.php") . "' ></iframe>";
                            break;
                        case 'ingresar':
                            echo "<iframe src='" . get_views("ingresardatos.php") . "' ></iframe>";
                            break;
                        case 'modificar':
                            echo "<iframe src='" . get_views("modificardatos.php") . "' ></iframe>";
                            break;
                        case 'eliminar':
                            echo "<iframe src='" . get_views("eliminardatos.php") . "' ></iframe>";
                            break;
                        default:
                            echo "<h1>Opción no válida</h1>";
                            break;
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>