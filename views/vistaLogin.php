<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="<?php echo get_urlBase('css/estilo.css'); ?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: row;
        }
        .welcome-section, .form-section {
            padding: 20px;
        }
        .welcome-section {
            border-right: 1px solid #fff;
        }
        .profile-photo img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }
        .login-button {
            background: #ff7e5f;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .login-button:hover {
            background: #feb47b;
        }
        .error-message {
            background: #ff4d4d;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <!-- Sección Izquierda -->
        <div class="welcome-section">
            <h2>LOGIN</h2>
            <div class="profile-photo">
                <img src="<?php echo get_urlBase('img/foto.png'); ?>" alt="Foto de perfil">
            </div>
            <p class="additional-text">Password</p>
        </div>
        <!-- Sección Derecha -->
        <div class="form-section">
            <form action="<?php echo get_urlBase('controllers/controladorLogin.php'); ?>" method="POST">
                <?php if (!empty($error_message)): ?>
                    <div class="error-message"><?php echo htmlspecialchars($error_message); ?></div>
                <?php endif; ?>
                <div class="input-group">
                    <label for="txtusername">Username</label>
                    <input type="text" id="txtusername" name="txtusername" required autocomplete="off">
                </div>
                <div class="input-group">
                    <label for="txtpassword">Password</label>
                    <input type="password" id="txtpassword" name="txtpassword" required>
                </div>
                <div class="actions">
                    <button type="submit" class="login-button">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
