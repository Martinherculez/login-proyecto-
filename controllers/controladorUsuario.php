<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modeloUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaUsuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('location: ' . get_urlBase('index.php'));
}


$modeloUsuario = new modeloUsuario();

$usuarios = $modeloUsuario->obtenerUsuarios();



mostrarUsuarios($usuarios);
