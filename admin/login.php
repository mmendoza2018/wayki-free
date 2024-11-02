<?php
session_start();

$conexion = mysqli_connect("localhost", "root", "", "waiky");

// Validación de los datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados
    $user = $_POST['user'] ?? null;
    $password = $_POST['password'] ?? null;

    // Verificar que no estén vacíos
    if (!$user || !$password) {
        echo json_encode([false, "Hubo un error verificando al usuario"]);
        exit;
    }

    // Consulta para obtener el usuario por el nombre de usuario
    $sql = "SELECT nombre, apellidos, correo, password FROM user WHERE correo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Verificar la contraseña
        if (password_verify($password, $row['password'])) {
            // Crear la sesión con los datos deseados
            $_SESSION['user_autenticate'] = [
                'nombre' => $row['nombre'],
                'apellidos' => $row['apellidos'],
                'correo' => $row['correo']
            ];

            echo json_encode([true, "Usuario verificado"]);
        } else {
            echo json_encode([false, "Hubo un error verificando al usuario"]);
        }
    } else {
        echo json_encode([false, "Hubo un error verificando al usuario"]);
    }

    // Cerrar la conexión y la declaración
    $stmt->close();
    $conexion->close();
}
