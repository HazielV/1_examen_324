<?php

include "conectar.inc.php";

// Obtener los datos del formulario
$usuario = $_POST['usuario'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($usuario) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'Usuario y contraseña son requeridos.']);
    exit();
}

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'";
$result1 = mysqli_query($con, $sql);

// Verificar las credenciales
if ($result1) {
    if (mysqli_num_rows($result1) > 0) {
        // Inicio de sesión exitoso
        $usuarioData = mysqli_fetch_assoc($result1);
        //propiedad
        $idPersona = $usuarioData['persona_id'];
        $sql = "SELECT * FROM propiedad pr join persona p on pr.idPropiedad = p.idPropiedad WHERE p.idPersona = '$idPersona' ";
        $result2 = mysqli_query($con, $sql);
        $propiedadData = mysqli_fetch_assoc($result2);

        session_start();
        $_SESSION['usuario'] = $usuarioData['usuario'];
        $_SESSION['codigoCatastral'] = $propiedadData['codigoCatastral'];

        echo json_encode(['success' => true, 'message' => '¡Inicio de sesión exitoso! Redirigiendo...', 'codigoCatastral' => $propiedadData['codigoCatastral']]);
    } else {
        // Usuario o contraseña incorrectos
        echo json_encode(['success' => false, 'message' => 'Usuario o contraseña incorrectos.']);
    }
} else {
    // Inicio de sesión fallido
    echo json_encode(['success' => false, 'message' => 'Usuario o contraseña incorrectos.']);
}
