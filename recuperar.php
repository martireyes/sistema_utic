<?php
require_once './clases/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Validar que el campo no esté vacío
    if (empty($_POST['email'])) {
        header("Location: forgot-password.php?status=empty");
        exit();
    }

    $email = trim($_POST['email']);

    // 2. Obtener la conexión mediante tu clase
    $conexion = Conectar::con();

    // 3. Consulta parametrizada segura contra Inyección SQL usando pg_query_params
    $sql = "SELECT usu_cod, usu_nick, usu_email FROM usuarios WHERE email = $1 LIMIT 1";
    $result = pg_query_params($conexion, $sql, array($email));

    if ($result && pg_num_rows($result) > 0) {
        $usuario = pg_fetch_assoc($result);

        // AQUÍ TU LÓGICA PARA ENVIAR EL CORREO / GENERAR TOKEN

        header("Location: recuperar.php?status=success");
        exit();
    } else {
        // El correo no existe en la base de datos
        header("Location: recuperar.php?status=not_found");
        exit();
    }
} else {
    header("Location: recuperar.php");
    exit();
}