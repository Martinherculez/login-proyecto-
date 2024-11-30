<?php

function mostrarFormularioBusqueda($mensaje = '')
{
    if (!empty($mensaje)) {
        echo $mensaje;
    }
    echo "<br>";
?>

    <form action="/controllers/controladorActualizarUsuario.php" method="POST">
        <label for="">Que usuario deseas modificar</label>
        <input type="text" name="datusuario" id="datusuario">
        <br>
        <button type="submit">Buscar usuario</button>
    </form>
<?php

}

function mostrarFormularioEdicion($usuario, $mensaje = '')
{
?>


    <form action="/controllers/controladorActualizarUsuario.php" method="POST">
        <input type="hidden" id="custId" name="custId" value="<?php echo $usuario['id'] ?>">

        <label for="datusuario"> Usuario </label>
        <input type="text" name="datusuario" id="datusuario" value="<?php echo $usuario['username'] ?>">
        <br>
        <label for="datpasword"> Password </label>
        <input type="password" name="datpassword" id="datpassword" value="<?php echo $usuario['password'] ?>">
        <br>
        <label for="datperfil"> Usuario </label>
        <input type="text" name="datperfil" id="datperfil" value="<?php echo $usuario['perfil'] ?>">
        <br>
        <button type="submit">Modificar usuario</button>
    </form>


<?php

}

?>