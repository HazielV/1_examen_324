<?php
include "conectar.inc.php";
session_start();

// Verificar si hay una sesión activa y si el usuario es 'admin'
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'admin') {
    // Si el usuario no es 'admin', redirige a una página de error o login
    header('Location: consultar.php');  // Puedes cambiar la redirección
    exit(); // Termina la ejecución del script
}

$sql = "SELECT propiedad.idPropiedad,codigoCatastral,propiedad.direccion,nombre,apellido_paterno,apellido_materno,i.tipoImpuesto from propiedad
    join persona p on propiedad.idPropiedad = p.idPropiedad
    join impuesto i on propiedad.idImpuesto = i.idImpuesto
    where codigoCatastral != 0000";

$resultado = mysqli_query($con, $sql);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        rel="stylesheet" />
    <style>
        :root {
            --color-primary: #004a87;
            --color-secondary: #f39c12;
            --color-tertiary: #2ecc71;
            --color-quaternary: #e74c3c;
            --color-quinary: #9b59b6;
        }

        .bg-ham-lp {
            background-color: var(--color-primary);
        }

        .text-ham-lp {
            color: var(--color-primary);
        }

        .btn-ham-lp {
            background-color: var(--color-primary);
            color: white;
        }

        .btn-ham-lp:hover {
            background-color: #003366;
            color: white;
        }

        .logout-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
    </style>
</head>

<body>
    <header class="bg-light py-5">
        <div class="container">
            <h1 class="text-center text-ham-lp">Listado de Personas por Propiedad</h1>
        </div>
    </header>

    <main class="container my-5">
        <div class="my-2">
            <a href="nueva_propiedad.php" class="btn btn-ham-lp">Nueva Propiedad</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="bg-ham-lp text-white ">
                    <tr>
                        <th>Código Catastral</th>
                        <th>Dirección</th>
                        <th>Propietario</th>
                        <th>Impuesto</th>

                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($fila = mysqli_fetch_array($resultado)) {
                    ?>
                        <tr>
                            <td><?php echo $fila["codigoCatastral"]; ?></td>
                            <td><?php echo $fila["direccion"]; ?></td>
                            <td>
                                <span><?php echo $fila["nombre"]; ?></span>
                                <span><?php echo $fila["apellido_paterno"]; ?></span>
                                <span><?php echo $fila["apellido_materno"]; ?></span>
                            </td>
                            <td>
                                <?php echo $fila["tipoImpuesto"]; ?>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-ham-lp" data-bs-toggle="modal" data-bs-target="#detalleModal">Ver Detalle</button>
                                <a href="editar.php?idPropiedad=<?php echo $fila['idPropiedad']; ?>&modifica=1" class="btn btn-sm btn-success">Editar</a>
                                <a href="eliminar.php?idPropiedad=<?php echo $fila['idPropiedad']; ?>" class="btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    <!-- <tr>
                        <td>001-0001-001-0</td>
                        <td>Av. 16 de Julio #1234</td>
                        <td>Juan Pérez</td>
                        <td>Residencial</td>
                        <td>
                            <button class="btn btn-sm btn-ham-lp" data-bs-toggle="modal" data-bs-target="#detalleModal">Ver Detalle</button>
                        </td>
                    </tr>
                    <tr>
                        <td>001-0002-003-0</td>
                        <td>Calle Sagárnaga #567</td>
                        <td>María López</td>
                        <td>Comercial</td>
                        <td>
                            <button class="btn btn-sm btn-ham-lp" data-bs-toggle="modal" data-bs-target="#detalleModal">Ver Detalle</button>
                        </td>
                    </tr>
                    <tr>
                        <td>002-0005-002-0</td>
                        <td>Av. Arce #890</td>
                        <td>Carlos Mamani</td>
                        <td>Residencial</td>
                        <td>
                            <button class="btn btn-sm btn-ham-lp" data-bs-toggle="modal" data-bs-target="#detalleModal">Ver Detalle</button>
                        </td>
                    </tr>
                    <tr>
                        <td>003-0007-004-0</td>
                        <td>Calle Murillo #1122</td>
                        <td>Ana Condori</td>
                        <td>Mixto</td>
                        <td>
                            <button class="btn btn-sm btn-ham-lp" data-bs-toggle="modal" data-bs-target="#detalleModal">Ver Detalle</button>
                        </td>
                    </tr>
                    <tr>
                        <td>004-0003-001-0</td>
                        <td>Av. Buenos Aires #2233</td>
                        <td>Luis Quispe</td>
                        <td>Industrial</td>
                        <td>
                            <button class="btn btn-sm btn-ham-lp" data-bs-toggle="modal" data-bs-target="#detalleModal">Ver Detalle</button>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>

    </main>
    <a href="logout.php" class="btn btn-danger logout-btn">Cerrar Sesión</a>
    <!-- Modal de Detalle -->
    <div class="modal fade" id="detalleModal" tabindex="-1" aria-labelledby="detalleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-ham-lp text-white">
                    <h5 class="modal-title" id="detalleModalLabel">Detalle de la Propiedad</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 class="mb-3">Información de la Propiedad</h6>
                    <p><strong>Código Catastral:</strong> 001-0001-001-0</p>
                    <p><strong>Dirección:</strong> Av. 16 de Julio #1234</p>
                    <p><strong>Tipo de Propiedad:</strong> Residencial</p>
                    <p><strong>Superficie del Terreno:</strong> 250 m²</p>
                    <p><strong>Superficie Construida:</strong> 180 m²</p>

                    <h6 class="mt-4 mb-3">Propietario</h6>
                    <p><strong>Nombre:</strong> Juan Pérez</p>
                    <p><strong>CI:</strong> 1234567 LP</p>
                    <p><strong>Teléfono:</strong> 2-2334455</p>
                    <p><strong>Correo Electrónico:</strong> juan.perez@email.com</p>

                    <h6 class="mt-4 mb-3">Historial de Trámites</h6>
                    <ul>
                        <li>2023-05-15: Actualización de datos catastrales</li>
                        <li>2022-11-10: Pago de impuestos anuales</li>
                        <li>2021-08-22: Solicitud de permiso de construcción</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-ham-lp">Imprimir Detalle</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>