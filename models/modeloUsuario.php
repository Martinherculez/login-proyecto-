<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php'; // Actualiza esta línea si es necesario

class modeloUsuario
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = conexion::obtenerConexion();
    }

    public function obtenerUsuarios()
    {
        $query = $this->conexion->query('SELECT id, username, password, perfil FROM usuarios');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarUsuario($username, $password, $perfil)
    {
        $query = "INSERT INTO usuarios (username, password, perfil) VALUES (:username, :password, :perfil)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':perfil', $perfil);
        return $stmt->execute();
    }

    public function eliminarUsuarioPorNombre($username)
    {
        $query = "DELETE FROM usuarios WHERE username = :username";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        return $stmt->execute();
    }

    public function actualizarUsuario($id, $username, $password, $perfil)
    {
        $query = "UPDATE usuarios SET username = :username, password = :password, perfil = :perfil WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':perfil', $perfil);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function obtenerUsuarioPorNombre($username)
    {
        $query = "SELECT id, username, password, perfil FROM usuarios WHERE username = :username";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function validarUsuario($username, $password)
    {
        $query = "SELECT id, username, password, perfil FROM usuarios WHERE username = :username and password = :password";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password); // Mejora pendiente: utilizar algún algoritmo de encriptación
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
