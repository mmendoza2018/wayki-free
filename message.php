<?php
// conectando a la base de datos
$conn = mysqli_connect("localhost", "root", "", "waiky") or die("Database Error");

// obteniendo el mensaje del usuario a través de ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

//comprobando la consulta del usuario a la consulta de la base de datos
$check_data = "SELECT replies, fin_conversacion, destino_id, tipo_destino FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

// si la consulta del usuario coincide con la consulta de la base de datos, mostraremos la respuesta; de lo contrario, irá a otra declaración
if (mysqli_num_rows($run_query) > 0) {
    //recuperando la reproducción de la base de datos de acuerdo con la consulta del usuario
    $fetch_data = mysqli_fetch_assoc($run_query);
    //almacenando la respuesta a una variable que enviaremos a ajax
    $replay = $fetch_data['replies'];
    $fin_conversacion = $fetch_data['fin_conversacion'];
    $destino_id = $fetch_data['destino_id'];
    $tipo_destino = $fetch_data['tipo_destino'];

    $arrayResponse = [
        "texto" => $replay,
        "fin_conversacion" => $fin_conversacion,
        "destino_id" => $destino_id,
        "tipo_destino" => $tipo_destino 
    ];

    echo json_encode($arrayResponse);
} else {
    $arrayResponse = [
        "texto" => "Lo siento no puedo interpretar lo que me indicas, podrias decirme nuevamente, ¿en que puedo ayudarte?",
        "fin_conversacion" => 0,
        "destino_id" => null,
        "tipo_destino" => null 
    ];
    echo json_encode($arrayResponse);
}
