<!DOCTYPE html>
<html>
<head>
    <title>Confirmación de Reservación</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333; background-color: #f4f4f4; padding: 20px; margin: 0;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 20px; border-radius: 8px;">
        <tr>
            <td>
                <img src="./logo.png" alt="" width="180px">
            </td>
        </tr>
        <tr>
            <td style="text-align: center; padding-bottom: 20px;">
                <h1 style="font-size: 24px; color: #333;">¡Gracias por tu reservación!</h1>
                <p style="font-size: 16px; color: #666;">Aquí están los detalles de tu reservación para <strong><?= $data["tituloSubCategoria"] ?> 
                <?=  $data["tituloCategoria"] ?></strong></p>
            </td>
        </tr>
        <tr>
            <td style="padding: 10px 0; border-top: 1px solid #ddd;">
                <h2 style="font-size: 18px; color: #333;">Detalles de la Reservación</h2>
                <p><strong>Cliente:</strong> <?= $data["nombres"] ?></p>
                <p><strong>Correo:</strong>  <?= $data["correo"] ?></p> 
                <p><strong>Telefono:</strong> <?= $data["celular"] ?></p>
                <p><strong>Num. de reservaciones:</strong> <?= $data["num_personas"] ?></p>
                <p><strong>Fecha de reserva :</strong> <?= $data["fecha_reserva"] ?></p>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px 0; text-align: center;">
                <a href="#" style="font-size: 16px; color: #ffffff; background-color: #4CAF50; text-decoration: none; padding: 10px 20px; border-radius: 5px; display: inline-block;">Ver Reservación</a>
            </td>
        </tr>

        <tr>
            <td style="padding-top: 20px; text-align: center; color: #888; font-size: 12px;">
                <p>Si tienes alguna pregunta, no dudes en <a href="mailto:soporte@example.com" style="color: #888; text-decoration: underline;">contactarnos</a>.</p>
                <p>&copy; 2023 waiky, Todos los derechos reservados.</p>
            </td>
        </tr>
    </table>
</body>
</html>