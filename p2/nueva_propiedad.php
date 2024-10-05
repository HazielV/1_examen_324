<?php
include "conectar.inc.php";

$sql = "SELECT * FROM impuesto";
$impuestos = mysqli_query($con, $sql);

$sql = "SELECT * FROM  distrito ";
$distrito = mysqli_query($con, $sql);
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
    </style>

</head>

<body>
    <header class="bg-light py-3">
        <div class="container">
            <h2 class="text-center text-ham-lp">Nueva propiedad</h2>
        </div>
    </header>

    <main class="container my-5">


        <form class="row g-3" action="guardar_propiedad.php" method="post">
            <div class="col-12">
                <h4>Datos de propiedad</h4>
            </div>
            <div class="col-md-6">
                <label for="codigo_catastral" class="form-label">Codigo catastral</label>
                <input placeholder="escriba el codigo" type="text" class="form-control" name="codigo_catastral" id="codigo_catastral">
            </div>
            <div class="col-md-6">
                <label for="idImpuesto" class="form-label">Tipo de Impuesto</label>
                <select id="idImpuesto" name="idImpuesto" class="form-select" aria-label="Default select example">
                    <option selected disabled>Seleccione un impuesto</option>
                    <?php
                    while ($filaD = mysqli_fetch_array($impuestos)) {
                        $opcion = '<option ';

                        $opcion .= 'value="' . $filaD["idImpuesto"] . '">' . $filaD["tipoImpuesto"] . '</option>';
                        echo $opcion;
                    }
                    ?>
                </select>
            </div>
            <div class="col-12">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" placeholder="escriba direccion de la propiedad" name="direccion">
            </div>
            <div class="col-12">
                <h4>Datos persona</h4>
            </div>
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input placeholder="escriba su nombre" type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="col-md-6">
                <label for="apellido_paterno" class="form-label">Apellido paterno</label>
                <input placeholder="escriba su apellido paterno" type="text" class="form-control" id="apellido_paterno" name="apellido_paterno">
            </div>
            <div class="col-md-6">
                <label for="apellido_materno" class="form-label">Apellido materno</label>
                <input placeholder="escriba su apellido materno" type="text" class="form-control" id="apellido_materno" name="apellido_materno">
            </div>
            <div class="col-md-6">
                <label for="ci" class="form-label">Nro. Documento</label>
                <input placeholder="escriba su nro. documento" type="number" class="form-control" id="ci" name="ci">
            </div>

            <div class="col-md-6">
                <label for="idDistrito" class="form-label">Distrito</label>
                <select id="idDistrito" name="idDistrito" class="form-select" aria-label="Default select example" onchange="zonaXdistrito(this.value)">
                    <option selected disabled>Seleccione un distrito</option>
                    <?php
                    while ($filaD = mysqli_fetch_array($distrito)) {
                        $opcion = '<option ';

                        $opcion .= 'value="' . $filaD["idDistrito"] . '">' . $filaD["nombre"] . '</option>';
                        echo $opcion;
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="idZona" class="form-label">Zona</label>
                <select id="idZona" name="idZona" class="form-select" aria-label="Default select example">
                    <option selected disabled>Seleccione una zona</option>

                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="./index.php" class="btn btn-danger">Cancelar</a>
            </div>


        </form>

    </main>
    <script>
        function zonaXdistrito(idDistrito) {
            const req = new XMLHttpRequest()
            req.open('GET', `obtiene_zona_x_distrito.php?idDistrito=${idDistrito}`)
            req.onload = () => {
                document.getElementById('idZona').innerHTML = req.responseText
            }
            req.send()
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>