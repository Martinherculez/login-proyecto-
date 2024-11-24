<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';

$conexion = new Conexion($host, $namedb, $userdb, $paswordb);
$pdo = $conexion->obtenerConexion();

// Primer formulario para buscar el usuario
if (!isset($_POST['datusuario'])) {
?>
    <form action="" method="POST">
        <label for="datusuario">¿Qué usuario deseas modificar?</label>
        <input type="text" name="datusuario" id="datusuario" required>
        <br>
        <button type="submit">Buscar usuario</button>
    </form>
    <?php
} else {
    // Buscar el usuario en la base de datos
    $datusuario = $_POST['datusuario'];
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = ?");
    $stmt->execute([$datusuario]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Mostrar formulario con los datos actuales del usuario
    ?>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

            <label for="username">Nombre de usuario</label>
            <input type="text" name="username" id="username" value="<?php echo $usuario['username']; ?>" required>
            <br>

            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" value="<?php echo $usuario['password']; ?>" required>
            <br>

            <label for="perfil">Perfil</label>
            <input type="text" name="perfil" id="perfil" value="<?php echo $usuario['perfil']; ?>" required>
            <br>

            <input type="hidden" name="actualizar" value="1">
            <button type="submit">Actualizar usuario</button>
        </form>
<?php
    } else {
        echo "Usuario no encontrado";
    }
}

// Procesar la actualización
if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $perfil = $_POST['perfil'];

    $stmt = $pdo->prepare("UPDATE usuarios SET username = ?, password = ?, perfil = ? WHERE id = ?");
    if ($stmt->execute([$username, $password, $perfil, $id])) {
        echo "Usuario actualizado correctamente";
    } else {
        echo "Error al actualizar el usuario";
    }
}
?>