<?php
include "conectar.inc.php";
// Simulación de sesión de usuario
session_start();
if (!isset($_SESSION['usuario'])) {
    // Si el usuario no está logueado, redirigir al login
    header("Location: index.php");
}
if (isset($_SESSION['usuario'])) {
    if ($_SESSION['usuario'] == 'admin') {
        header('Location: dashboard.php');
    }
}
$id = $_SESSION['id'];
$sql = "SELECT * FROM persona p join usuarios u on p.idPersona = u.persona_id where u.id = '$id' ";
$result = mysqli_query($con, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $usuarioData = mysqli_fetch_assoc($result);
        // Datos simulados del usuario y su propiedad
        $userData = [
            'nombre' => $usuarioData['nombre'],
            'apellido paterno' => $usuarioData['apellido_paterno'],
            'apellido materno' => $usuarioData['apellido_materno'],
        ];
        $persona_id = $usuarioData['idPersona'];
        $sql = "SELECT * FROM propiedad pr join persona p on p.idPropiedad = pr.idPropiedad join impuesto i on pr.idImpuesto = i.idImpuesto where p.idPersona = '$persona_id' ";
        $result = mysqli_query($con, $sql);
        $propiedad = mysqli_fetch_assoc($result);

        $propiedadData = [
            'direccion' => $propiedad['direccion'],
            'codigo Catastral' => $propiedad['codigoCatastral'],
            'tipo Impuesto' => $propiedad['tipoImpuesto'],
        ];
    }
} else {
    echo 'algo salio mal';
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Datos de Propiedad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .logout-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Bienvenido, <?php echo htmlspecialchars($userData['nombre']); ?></h1>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">Mis Datos Personales</h5>
            </div>
            <div class="card-body">
                <dl class="row">
                    <?php foreach ($userData as $label => $value): ?>
                        <dt class="col-sm-3"><?php echo htmlspecialchars(ucfirst($label)); ?>:</dt>
                        <dd class="col-sm-9"><?php echo htmlspecialchars($value); ?></dd>
                    <?php endforeach; ?>
                </dl>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-success text-white">
                <h5 class="card-title mb-0">Datos de Mi Propiedad</h5>
            </div>
            <div class="card-body">
                <dl class="row">
                    <?php foreach ($propiedadData as $label => $value): ?>
                        <dt class="col-sm-3"><?php echo htmlspecialchars(ucfirst($label)); ?>:</dt>
                        <dd class="col-sm-9"><?php echo htmlspecialchars($value); ?></dd>
                    <?php endforeach; ?>
                </dl>
                <!-- <dl class="row">
                    <dt class="col-sm-3">Dirección:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($propertyData['direccion']); ?></dd>

                    <dt class="col-sm-3">Tipo:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($propertyData['tipo']); ?></dd>

                    <dt class="col-sm-3">Superficie:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($propertyData['superficie']); ?></dd>

                    <dt class="col-sm-3">Habitaciones:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($propertyData['habitaciones']); ?></dd>

                    <dt class="col-sm-3">Baños:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($propertyData['banos']); ?></dd>
                </dl> -->
            </div>
        </div>
    </div>

    <a href="logout.php" class="btn btn-danger logout-btn">Cerrar Sesión</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>