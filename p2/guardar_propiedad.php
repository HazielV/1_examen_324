<?php
include "conectar.inc.php";
$codigo_catastral = $_POST["codigo_catastral"];
$idImpuesto = intval($_POST["idImpuesto"]); // Convierte a entero
$direccion = $_POST["direccion"];

$nombre = $_POST["nombre"];
$apellido_paterno = $_POST["apellido_paterno"];
$apellido_materno = $_POST["apellido_materno"];
$idDistrito = $_POST["idDistrito"];
$idZona = $_POST["idZona"];
$ci = $_POST["ci"];


$sql = "INSERT INTO propiedad (direccion, codigoCatastral, idImpuesto) VALUES ('$direccion', '$codigo_catastral', '$idImpuesto');";
mysqli_query($con, $sql);

$idPropiedad = mysqli_insert_id($con);

$sql = "INSERT INTO persona (nombre, apellido_paterno, apellido_materno, direccion, idDistrito, idZona, idPropiedad,ci) VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$direccion','$idDistrito','$idZona','$idPropiedad','$ci');";
mysqli_query($con, $sql);


$idPersona = mysqli_insert_id($con);
$sql = "INSERT INTO usuarios (persona_id, password, usuario) VALUES ('$idPersona', '$ci', '$nombre');";
mysqli_query($con, $sql);

header("Location: index.php");
