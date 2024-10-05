<?php
include "conectar.inc.php";
session_start();
$codigoCatastral = $_SESSION['codigoCatastral'];
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'obtieneXcodigo.php', // El archivo PHP que se llama
                type: 'GET', // Método GET
                data: {
                    codigoCatastral: '<?php echo $codigoCatastral; ?>',
                }, // Parámetros enviados
                success: function(response) {
                    // Manejar la respuesta
                    $("#mostrar").html(response); // Insertar el resultado en el div con id 'mostrar'
                },
                error: function(xhr, status, error) {
                    // Manejar el error
                    console.error("Error en la solicitud:", status, error);
                    alert("Ocurrió un error al obtener los datos.");
                }
            });
        });
    </script>
</head>

<body>
    <header class="bg-light py-5">
        <div class="container">
            <h1 class="text-center text-ham-lp">Pago de impuestos</h1>
        </div>
    </header>

    <main class="container my-5">
        <div id="mostrar">

        </div>

    </main>
    <a href="logout.php" class="btn btn-danger logout-btn">Cerrar Sesión</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>