<?php
require_once('../Conexion.php');

function ListarReservasClasePorEquipoPorDiaSQL($equipo, $fecha_actual, $fecha_mañana)
{
    $conexion = Connect();
    $sql = "SELECT *  
	FROM reserva
	WHERE codigo_equipo = '$equipo' 
	AND estado_reserva = 'Activa'
    AND hora_inicio >= '$fecha_actual'
    AND hora_inicio < '$fecha_mañana'";
    $consulta = mysqli_query($conexion, $sql);
    $respuesta = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
    mysqli_close($conexion);
    return $respuesta;
}
