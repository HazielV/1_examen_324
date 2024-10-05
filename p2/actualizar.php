<?php
include "conectar.inc.php";
$idPropiedad = $_POST["idPropiedad"];
$codigo_catastral = $_POST["codigoCatastral"];
$idImpuesto = intval($_POST["idImpuesto"]); // Convierte a entero
$direccion = $_POST["direccion"];


$idPersona = $_POST["idPersona"];
$nombre = $_POST["nombre"];
$apellido_paterno = $_POST["apellido_paterno"];
$apellido_materno = $_POST["apellido_materno"];
$idDistrito = $_POST["idDistrito"];
$idZona = $_POST["idZona"];
$ci = $_POST["ci"];

/* UPDATE dbhaziel.propiedad SET direccion = 'Av. Siempre Viva 123', codigoCatastral = '1001', idImpuesto = 1 WHERE idPropiedad = 1;
 */

$sql = "UPDATE propiedad SET direccion='$direccion', codigoCatastral='$codigo_catastral', idImpuesto='$idImpuesto' where idPropiedad=$idPropiedad";
mysqli_query($con, $sql);


$sql = "UPDATE persona SET nombre='$nombre', apellido_paterno='$apellido_paterno', apellido_materno='$apellido_materno',direccion='$direccion',idDistrito='$idDistrito',idZona='$idZona',ci='$ci' where idPersona=$idPersona";
mysqli_query($con, $sql);

$sql = "UPDATE usuarios SET usuario='$nombre', password='$ci' where persona_id=$idPersona";

header("Location: index.php");
