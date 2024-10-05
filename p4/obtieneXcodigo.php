<?php
include "conectar.inc.php";

$codigoCatastral = $_GET['codigoCatastral'];

// Asegúrate de que el ID sea un número para evitar inyecciones SQL
/* $idDistrito = intval($idDistrito); */

$sql = "SELECT * FROM propiedad join impuesto i on propiedad.idImpuesto = i.idImpuesto join persona p on propiedad.idPropiedad = p.idPropiedad WHERE  codigoCatastral = $codigoCatastral";
$propiedades = mysqli_query($con, $sql);

if ($propiedades && mysqli_num_rows($propiedades) > 0) {
    $propiedades = mysqli_fetch_array($propiedades);
    $salida = '<div class="card mt-2">';
    $salida .= ' <div class="card-header bg-primary text-white"> <h5 class="card-title mb-0">Datos de propiedad</h5> </div>';
    $salida .= '<div class="card-body"> <h6 class="card-subtitle mb-3 text-muted">Datos de la Propiedad</h6> <dl class="row">';
    $salida .= '<dt class="col-sm-3">Codigo catastral:</dt> <dd class="col-sm-9">' . $propiedades["codigoCatastral"] . '</dd>';
    $salida .= '<dt class="col-sm-3">Tipo de impuesto:</dt> <dd class="col-sm-9">' . $propiedades["tipoImpuesto"] . '</dd></dl>';

    $salida .= '<h6 class="card-subtitle mb-3 text-muted">Datos del Propietario</h6> <dl class="row">';
    $salida .= '<dt class="col-sm-3">Nombre:</dt> <dd class="col-sm-9">' . $propiedades["nombre"] . '</dd>';
    $salida .= '<dt class="col-sm-3">Apellido paterno:</dt> <dd class="col-sm-9">' . $propiedades["apellido_paterno"] . '</dd>';
    $salida .= '<dt class="col-sm-3">Apellido materno:</dt> <dd class="col-sm-9">' . $propiedades["apellido_materno"] . '</dd>';
    $salida .= '</dl></div></div>';
} else {
    $salida = '<div class="card mt-2" >';
    $salida .= ' <div class="card-header">    Datos de propiedad  </div>';
    $salida .= '<div class="card-body">';
    $salida .= ' <div > No se encontro ninguna propieda con ese codigo  </div>';

    $salida .= "</div>";
    $salida .= "</div>";
}

echo $salida;
