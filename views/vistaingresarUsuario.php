<?php

function mostrarFormularioIngreso($mensaje)
{
    if (empty($mensaje)) {

?>
        <form action="/controllers/controladorIngresarUsuario.php" method="POST">
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

<?php
    } else {
        echo $mensaje;
    }
}
?>