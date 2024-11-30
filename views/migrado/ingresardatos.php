<?php

session_start();

if (!isset($_SESSION["txtusername"])) {
    header('location: ' . get_UrlBase('index.php'));
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tmpdatusuario = $_POST["datusuario"];
    $tmpdatpassword = $_POST["datpassword"];
    $tmpdatperfil = $_POST["datperfil"];



    $conexion = new Conexion($host, $namedb, $userdb, $paswordb);
    $pdo = $conexion->obtenerConexion();
    try {

        $sentencia = $pdo->prepare("INSERT INTO usuarios (username, password, perfil) VALUES (?, ?, ?)");
        $sentencia->execute([$tmpdatusuario, $tmpdatpassword, $tmpdatperfil]);
        echo "USUARIO RESGISTRADO CON EXITO <br>";
    } catch (PDOException $e) {
        echo "Error al registrar el usuario ...<br>";
        echo $e->getMessage();
    }
    exit(); // cortar la ejecucion





}
// Ordenar por el campo 'username'
//$query = $pdo->query("SELECT id, username, password, perfil FROM usuarios ORDER BY username ASC");

?>

<form action="" method="POST">
    <label for="datusiario"> usuario </label>
    <input type="text" name="datusuario" id="datusuario">
    <br>
    <label for="datpassword"> Password </label>
    <input type="password" name="datpassword" id="datpassword">
    <br>
    <label for="datperfil"> Password </label>
    <input type="text" name="datperfil" id="datperfil">
    <br>
    <button type="submit"> Registrar usuario </button>
</form>


<th> username </th>
<th> password </th>
<th> perfil </th>
</form>