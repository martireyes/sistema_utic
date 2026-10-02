<?php
require_once './clases/conexion.php';

$conexion = Conectar::con();
$token = $_GET['token'] ?? '';
$error = "";
$exito = false;

// 1. Validar que el token sea válido, no haya expirado y no haya sido usado
$sql = "SELECT tok_cod, usu_cod FROM tokens 
        WHERE token = $1 AND tok_expira > NOW() AND tok_usado = FALSE LIMIT 1";
$res = pg_query_params($conexion, $sql, array($token));

if (!$res || pg_num_rows($res) == 0) {
    die("El enlace de recuperación es inválido o ha expirado.");
}

$datosToken = pg_fetch_assoc($res);

// 2. Procesar el cambio de contraseña
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevaClave = $_POST['password'] ?? '';
    $confirmarClave = $_POST['confirm_password'] ?? '';

    if (empty($nuevaClave) || strlen($nuevaClave) < 6) {
        $error = "La contraseña debe tener al menos 6 caracteres.";
    } elseif ($nuevaClave !== $confirmarClave) {
        $error = "Las contraseñas no coinciden.";
    } else {
        // Encriptar la nueva clave
        $claveHash = password_hash($nuevaClave, PASSWORD_BCRYPT);

        // Actualizar la contraseña del usuario en la tabla 'usuarios'
        $sqlUpdate = "UPDATE usuarios SET usu_clave = $1 WHERE usu_cod = $2";
        pg_query_params($conexion, $sqlUpdate, array($claveHash, $datosToken['usu_cod']));

        // Marcar el token como usado
        $sqlUsed = "UPDATE tokens SET tok_usado = TRUE WHERE tok_cod = $1";
        pg_query_params($conexion, $sqlUsed, array($datosToken['tok_cod']));

        $exito = true;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Contraseña</title>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <?php if ($exito): ?>
        <div class="alert alert-success">
            ¡Contraseña actualizada con éxito! Ya puedes <a href="index.php">iniciar sesión</a>.
        </div>
    <?php else: ?>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="mb-3">
                <label>Nueva Contraseña</label>
                <input type="password" name="password" class="form-control" required />
            </div>
            <div class="mb-3">
                <label>Confirmar Contraseña</label>
                <input type="password" name="confirm_password" class="form-control" required />
            </div>
            <button type="submit" class="btn btn-primary w-100">Guardar Contraseña</button>
        </form>
    <?php endif; ?>
</div>
</body>
</html>