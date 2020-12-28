<?php
require_once('../Conexion.php');

function ListarReservasPorEquipoPorDiaSQL($equipo, $hoy, $mañana)
{
    $conexion = Connect();
    $sql = "SELECT *  
	FROM reserva
	WHERE codigo_equipo = '$equipo' 
	AND estado_reserva = 'Activa'
    AND hora_inicio >= '$hoy'
    AND hora_inicio < '$mañana'";
    $consulta = mysqli_query($conexion, $sql);
    $respuesta = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
    mysqli_close($conexion);
    return $respuesta;
}
