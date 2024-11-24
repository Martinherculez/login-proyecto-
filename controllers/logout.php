<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once  $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';

session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();

// redirect to the index page
header('Location: ' . get_urlBase('index.php'));
exit();
