<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php'; // Actualiza esta línea si es necesario

class modeloUsuario
{
    private $pdo;

    public function __construct()
    {
        $conexion = new Conexion(DB_HOST, DB_NAME, DB_USER, DB_PASS);
        $this->pdo = $conexion->obtenerConexion();
    }

    public function obtenerUsuarios()
    {
        $query = $this->pdo->query('select id, username, password, perfil from usuarios');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    //debe hacer un  metodo para hacer un insert
    public function insertarUsuario($username, $password, $perfil)
    {
        $query = 'insert into usuarios (username, password, perfil) values (:username, :password, :perfil)';

        //sstatement o senteencia
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam('username', $username);
        $stmt->bindParam('password', $password);
        $stmt->bindParam('perfil', $perfil);
        return $stmt->execute();
    }
}
