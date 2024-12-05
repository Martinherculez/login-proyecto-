<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modeloUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaEliminarUsuario.php';



if (!isset($_SESSION["txtusername"])) {
    header('location: ' . get_UrlBase('index.php'));
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpdatusuario = $_POST["datusuario"];

    $mensaje = '';
    if ($tmpdatusuario) {
        $modeloUsuario = new modeloUsuario();
        try {
            $modeloUsuario->eliminarUsuarioPorNombre($tmpdatusuario);
            $mensaje = "USUARIO ELIMINADO CON EXITO .... ";
        } catch (PDOException $e) {
            $mensaje = "Error al eliminar el usuario ...<br>" . $e->getMessage();
        }
    }

    mostrarFormularioEliminar($mensaje);
} else {
    mostrarFormularioEliminar();
}
