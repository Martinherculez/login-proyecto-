<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';

session_start();

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $v_username = $_POST["txtusername"] ?? '';
    $v_password = $_POST["txtpassword"] ?? '';

    // Aquí puedes agregar la lógica para validar el usuario y la contraseña
    // Ejemplo de validación simple (deberías usar una consulta a la base de datos)
    if ($v_username === 'admin' && $v_password === '1234') {
        $_SESSION["txtusername"] = $v_username;
        header('Location: ' . get_views('dashboard.php'));
        exit();
    } else {
        $error_message = 'Usuario o contraseña incorrectos.';
    }
}

// En caso de que el usuario presione directamente sobre la URL inicial
if (isset($_SESSION["txtusername"])) {
    header('Location: ' . get_views('dashboard.php'));
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inicio de Sesión</title>
    <link rel="stylesheet" href="<?php echo get_urlBase('css/estilo.css') ?>">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            font-family: Arial, sans-serif;
        }

        .login-container {
            display: flex;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 800px;
            width: 100%;
        }

        .welcome-section {
            background: #6a11cb;
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 50%;
        }

        .welcome-section h2 {
            margin: 0;
            font-size: 2em;
        }

        .profile-photo img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            margin: 20px 0;
        }

        .form-section {
            padding: 40px;
            width: 50%;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .login-button,
        .remember-button {
            background: #2575fc;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login-button:hover,
        .remember-button:hover {
            background: #6a11cb;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <!-- Sección Izquierda -->
        <div class="welcome-section">
            <h2>LOGIN</h2>
            <div class="profile-photo">
                <img src="img/foto.png" alt="Foto de perfil">
            </div>
            <p class="additional-text">Password</p>
        </div>
        <!-- Sección Derecha -->
        <div class="form-section">
            <form action="" method="POST">
                <?php if ($error_message): ?>
                    <div class="error-message"><?php echo $error_message; ?></div>
                <?php endif; ?>
                <div class="input-group">
                    <label for="txtusername">Username</label>
                    <input type="text" id="txtusername" name="txtusername" required autocomplete="off">
                </div>
                <div class="input-group">
                    <label for="txtpassword">Password</label>
                    <input type="password" id="txtpassword" name="txtpassword" required>
                </div>
                <button type="button" class="remember-button">REMEMBER</button>
                <div class="actions">
                    <button type="submit" class="login-button">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>