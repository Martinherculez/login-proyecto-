<?php


require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php'; // Actualiza esta línea si es necesario

//todo lo relacionado con la base de datos; debe de estar en el modelo 
// Un modelo por lo regular apunta a una tabla o  una vista 
class modeloUsuario
{
    private $conexion;

    public function __construct()
    {

        $this->conexion = conexion::obtenerConexion();
    }
    //debe hacer un metodo para hacer select 
    public function obtenerUsuarios()
    {
        $query = $this->conexion->query('select id, username, password, perfil from usuarios');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    //debe hacer un  metodo para hacer un insert
    public function insertarUsuario($username, $password, $perfil)
    {
        $query = "INSERT INTO  usuarios(username, password, perfil) values (:username, :password, :perfil)";

        //sstatement o senteencia
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam('username', $username);
        $stmt->bindParam('password', $password);
        $stmt->bindParam('perfil', $perfil);
        //echo $stmt;
        return $stmt->execute();
    }

    //debe hacer un metodo para hacer un delete
    public function eliminarUsuarioPorNombre($username)
    {
        $query = "delete from usuarios where  username = :username";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam('username', $username);
        return $stmt->execute();
    }

    //debe hacer un metodo para hacer un delete
    public function actualizarUsuario($id, $username, $password, $perfil)
    {
        $query = "update usuarios set username = :username, password = :password, perfil = :perfil where id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam('username', $username);
        $stmt->bindParam('password', $password);
        $stmt->bindParam('perfil', $perfil);
        $stmt->bindParam('id', $id);
        return $stmt->execute();
    }

    //obtiene un solo usuario por su nombre 
    public function obtenerUsuarioPorNombre($username)
    {
        $query = "select id, username, password , perfil  from usuarios where username = :username";
        //sentencia
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam('username', $username);
        //echo $stmt;
        $stmt->execute();
        return  $stmt->fetch(PDO::FETCH_ASSOC); //solo un registro 

    }
}
