<?php
require '../phpMailer/Exception.php';
require '../phpMailer/PHPMailer.php';
require '../phpMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$conexion = mysqli_connect("localhost", "root", "", "waiky");

//error_reporting(0);

$idReserva = @$_GET["id"];

try {
    $mail = new PHPMailer(true);

    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.mistiplas.com';                    // host de quien va brindar el servicio
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'administrador@mistiplas.com';                     // SMTP username
    $mail->Password   = ',vEF2lPuLq7S';                               // SMTP password
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    ob_start();

    $sql = "SELECT *, sesu.titulo as tituloSubCategoria, seca.titulo as tituloCategoria, res.id as idReserva, sesu.descripcion as descripcionSubCategoria 
    FROM reservas res 
    LEFT JOIN servicios_subcategorias sesu ON res.id_servicio_subcategoria   = sesu.id
    LEFT JOIN servicios_categorias seca ON res.id_servicio_categoria  = seca.id
    LEFT JOIN clientes cli ON res.id_cliente = cli.id WHERE estado_reserva = 1 AND res.id = '$idReserva'";

    $response = mysqli_query($conexion, $sql);

    $data = mysqli_fetch_assoc($response);

    include './plantilla.php';
    $htmlContent = ob_get_clean();

    //correo del que se enviara los mensajes
    $mail->setFrom('administrador@mistiplas.com', 'WAIKY');
    $arrayPersonasDestinatario = [
        ["correo" => $data["correo"]]
    ];

    foreach ($arrayPersonasDestinatario as $x) {
        $mail->AddAddress($x["correo"]);
    }

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'RESERVA EXITOSA';

    $mail->Body = $htmlContent;
    $mail->send();
    echo json_encode([true, "Correo enviado"]);
} catch (Exception $e) {
    echo json_encode([false, "Correo enviado"]);
}
