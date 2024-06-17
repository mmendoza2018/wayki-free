<?php
require_once('../mpdf/vendor/autoload.php');
use Mpdf\Mpdf;

$conexion = mysqli_connect("localhost", "root", "", "waiky");

$idReserva = @$_GET["id"];

ob_start();

$sql = "SELECT *, sesu.titulo as tituloSubCategoria, seca.titulo as tituloCategoria, res.id as idReserva, sesu.descripcion as descripcionSubCategoria 
FROM reservas res 
LEFT JOIN servicios_subcategorias sesu ON res.id_servicio_subcategoria   = sesu.id
LEFT JOIN servicios_categorias seca ON res.id_servicio_categoria  = seca.id
LEFT JOIN clientes cli ON res.id_cliente = cli.id WHERE estado_reserva = 1 AND res.id = '$idReserva'";

$response = mysqli_query($conexion, $sql);

$data = mysqli_fetch_assoc($response);

$css = file_get_contents("./global.css");
include './capacitacionTemplate.php';
$html = ob_get_clean();

$mpdf = new Mpdf(['format' => 'A5']);
$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);

$pdfContenido = $mpdf->Output('', 'S');

echo $pdfContenido;
