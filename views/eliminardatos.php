<?php

session_start();

if (!isset($_SESSION["txtusername"])) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
    header('location: ' . get_UrlBase('index.php'));
    exit();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';

$conexion = new Conexion($host, $namedb, $userdb, $paswordb);
$pdo = $conexion->obtenerConexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tmpdatusuario = $_POST["datusuario"];
    $tmpdatpassword = isset($_POST["datpassword"]) ? $_POST["datpassword"] : null;
    $tmpdatperfil = isset($_POST["datperfil"]) ? $_POST["datperfil"] : null;



    $conexion = new Conexion($host, $namedb, $userdb, $paswordb);
    $pdo = $conexion->obtenerConexion();
    try {

        $sentencia = $pdo->prepare("delete from usuarios where username = ?");
        $sentencia->execute([$tmpdatusuario]);
        echo $tmpdatusuario . " HA SIDO ELIMINADO CON EXITO <br>";
    } catch (PDOException $e) {
        echo "HUBO UN ERROR NO SE PUDO ELMINAR ...<br>";
        echo $e->getMessage();
    }
    exit(); // cortar la ejecucion



}


?>

<form action="" method="POST">
    <label for=""> A quien debo eliminar </label>
    <input type="text" name="datusuario" id="datusuario">
    <br>
    <button type="submit"> Eliminar usuario </button>
</form>