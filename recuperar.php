<?php
require_once './clases/conexion.php';

// Importar clases de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['email'])) {
        header("Location: recuperar.php?status=empty");
        exit();
    }

    $email = trim($_POST['email']);
    $conexion = Conectar::con();

    // 1. Verificar si el correo existe
    $sql = "SELECT usu_cod, usu_nick, usu_email FROM usuarios WHERE usu_email = $1 LIMIT 1";
    $result = pg_query_params($conexion, $sql, array($email));

    if ($result && pg_num_rows($result) > 0) {
        $usuario = pg_fetch_assoc($result);
        $usu_cod = $usuario['usu_cod'];

        // 2. Generar Token seguro de 64 caracteres
        $token = bin2hex(random_bytes(32));

        // 3. Definir fecha de expiración (1 hora desde el momento actual)
        $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // 4. Guardar token en la base de datos
        $sqlToken = "INSERT INTO tokens (usu_cod, token, tok_expira) VALUES ($1, $2, $3)";
        pg_query_params($conexion, $sqlToken, array($usu_cod, $token, $expira));

        // 5. Enviar Correo con PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configuración del Servidor SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';  // Servidor SMTP (ejemplo: Gmail)
            $mail->SMTPAuth   = true;
            $mail->Username   = 'rreyes1700ii@gmail.com'; // Tu cuenta de correo
            $mail->Password   = 'Amelie@2026'; // Contraseña de aplicación
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Destinatarios
            $mail->setFrom('rreyes1700ii@gmail.com', 'Sistema UTIC');
            $mail->addAddress($email, $usuario['usu_nick']);

            // Enlace de recuperación
            $link = "http://localhost/sistema_utic/clave_reset.php?token=" . $token;

            // Contenido del correo
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Recuperación de Contraseña - Sistema UTIC';
            $mail->Body    = "
                <h2>Hola, {$usuario['usu_nick']}</h2>
                <p>Has solicitado restablecer tu contraseña. Haz clic en el siguiente enlace para continuar:</p>
                <p><a href='{$link}' style='background-color: #0d6efd; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;'>Restablecer Contraseña</a></p>
                <p>Este enlace expirará en 1 hora.</p>
                <p>Si no realizaste esta solicitud, puedes ignorar este mensaje.</p>
            ";

            $mail->send();
            header("Location: recuperar.php?status=success");
            exit();

        } //catch (Exception $e) {
            //header("Location: recuperar.php?status=mail_error");
            //exit();
            catch (Exception $e) {
                // Imprime el error real en pantalla para diagnosticar
                echo "Error al enviar el correo: " . $mail->ErrorInfo;
                exit();
        }

    } else {
        header("Location: recuperar.php?status=not_found");
        exit();
    }
}
?>