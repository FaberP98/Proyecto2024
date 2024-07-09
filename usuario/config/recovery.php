<?php
// Importa las clases necesarias de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluye los archivos necesarios de PHPMailer y la conexión a la base de datos
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
include('../conexion.php');

// Obtiene el correo electrónico enviado desde el formulario de recuperación
$correo = $_POST['correo'];

// Prepara y ejecuta una consulta para obtener el ID de usuario asociado al correo electrónico
$stmt = $con->prepare("SELECT DocId, Correo FROM tblusuario WHERE Correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

// Verifica si se encontró al menos un usuario con el correo electrónico proporcionado
if ($result->num_rows > 0) {
    // Obtiene la información del primer usuario encontrado
    $row = $result->fetch_assoc();
    $userId = $row['DocId'];

    // Crea una instancia de PHPMailer
    $mail = new PHPMailer(true);
    
    try {
        // Configuración del servidor SMTP
        $mail->SMTPDebug = 0;                      // Habilita la salida de depuración detallada
        $mail->isSMTP();                            // Envía el correo usando SMTP
        $mail->Host       = 'smtp.gmail.com';       // Establece el servidor SMTP
        $mail->SMTPAuth   = true;                   // Habilita la autenticación SMTP
        $mail->Username   = 'sebasrojgreen@gmail.com'; // Nombre de usuario SMTP
        $mail->Password   = 'zdtc lewb lepb aiae';  // Contraseña SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Habilita la encriptación TLS
        $mail->Port       = 465;                    // Puerto TCP para conectarse
        
        // Configura el remitente y destinatario del correo
        $mail->setFrom('sebasrojgreen@gmail.com', 'Gestiona el Riesgo');
        $mail->addAddress($correo);                 // Agrega un destinatario
        
        // Configura la codificación de caracteres
        $mail->CharSet = 'UTF-8';

        // Configura el contenido del correo
        $mail->isHTML(true);                        // Establece el formato del correo a HTML
        $mail->Subject = 'Cambiar contraseña'; // Asunto del correo
        $mail->Body    = '<h2>Estimado usuario</h2><br>
        <h3>Ha solicitado cambiar su contraseña. Por favor, haga clic en el siguiente enlace para completar el proceso de recuperación de contraseña:<br><br>
        <a href="http://localhost/proyecto/ProyectoFormativoV1.0/usuario/change_password.php?id=' . $userId . '">Recuperación de contraseña</a><br><br>
        Si no solicitó este cambio, por favor ignore este correo.</h3>'; // Cuerpo del correo en HTML
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; // Cuerpo del correo en texto plano
        
        // Envía el correo
        $mail->send();
        // Redirige al usuario a la página de inicio de sesión con un mensaje de éxito
        header('location:../login.php');
        session_start();
        $_SESSION['status'] = 'ok';
    } catch (Exception $e) {
        // Si ocurre un error durante el envío del correo, redirige al usuario a la página de inicio de sesión con un mensaje de error
        header('location:../recovery.php');
        session_start();
        $_SESSION['status'] = 'error-envio';
    }
}
?>

