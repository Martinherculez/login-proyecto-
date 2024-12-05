<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modeloUsuario.php';

if (isset($_SESSION["txtusername"])) {
    header('Location: ' . get_controllers('controladorDashboard.php'));
    exit();
}

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $v_username = trim($_POST["txtusername"] ?? '');
    $v_password = trim($_POST["txtpassword"] ?? '');

    if (!empty($v_username) && !empty($v_password)) {
        $modelo = new modeloUsuario();
        $credenciales = $modelo->validarUsuario($v_username, $v_password);

        if ($credenciales) {
            $_SESSION["txtusername"] = $v_username;
            header('Location: ' . get_controllers('controladorDashboard.php'));
            exit();
        } else {
            $error_message = 'Usuario o contraseña incorrectos.';
        }
    } else {
        $error_message = 'Por favor, complete todos los campos.';
    }
}

include get_views_disk('vistaLogin.php');

?>