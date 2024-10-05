<?php
include "conectar.inc.php";

$idDistrito = $_GET['idDistrito'];

// Asegúrate de que el ID sea un número para evitar inyecciones SQL
/* $idDistrito = intval($idDistrito); */

$sql = "SELECT idZona, nombre FROM zona WHERE idDistrito = $idDistrito";
$distritos = mysqli_query($con, $sql);

// Inicializamos una variable para almacenar las opciones
$options = '';
if ($distritos) {
    while ($filaD = mysqli_fetch_array($distritos)) {
        $opcion = '<option ';
        $opcion .= 'value="' . $filaD["idZona"] . '">' . $filaD["nombre"] . '</option>'; // Asegúrate de usar "idZona" aquí
        $options .= $opcion;
    }
}

// En caso de que no haya zonas, puedes mostrar un mensaje opcional
if (empty($options)) {
    $options = '<option value="">No hay zonas disponibles</option>';
}

echo $options;
