<?php
// Iniciar sesión
session_start();

// Definir la contraseña
$password = "mi_contraseña_segura"; // Cambia esto por tu contraseña

// Verificar si ya se ha introducido la contraseña
if (isset($_POST['password'])) {
    if ($_POST['password'] === $password) {
        $_SESSION['authenticated'] = true;
    } else {
        $error = "Contraseña incorrecta";
    }
}

// Si no está autenticado, mostrar el formulario de contraseña
if (!isset($_SESSION['authenticated'])) {
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Restringido</title>
    <!-- Vincular CSS externo -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Acceso a la Transmisión</h1>
        <p>Introduce la contraseña para acceder:</p>
        <form method="POST" action="">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="submit" value="Ingresar">
        </form>
        <?php if (isset($error)) { echo '<p class="error">' . $error . '</p>'; } ?>
    </div>
</body>
</html>

<?php
    exit; // Detener la ejecución del resto del script si no está autenticado
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transmisión de Audio en Vivo</title>
    <!-- Vincular CSS externo -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Transmisión en Vivo</h1>
        <p>Haz clic en el reproductor para escuchar el audio en vivo.</p>
        <audio controls>
            <source src="http://tu_ip_publica:8000/stream" type="audio/mpeg">
            Tu navegador no soporta el elemento de audio.
        </audio>
    </div>
    <!-- Vincular JavaScript externo -->
    <script src="scripts.js"></script>
</body>
</html>
