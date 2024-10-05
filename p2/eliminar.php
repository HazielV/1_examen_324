<?php
include "conectar.inc.php";
$idPropiedad = $_GET["idPropiedad"];

$sql = "DELETE FROM persona WHERE idPropiedad = '$idPropiedad'";
$result1 = mysqli_query($con, $sql);

if ($result1) {
    $sql = "DELETE FROM propiedad WHERE idPropiedad = '$idPropiedad'";
    mysqli_query($con, $sql);
}
header("Location: index.php");
