<?php
require_once('../Conexion.php');

function ListarSalasPorSedeSQL($id_sede)
{
	$conexion = Connect();
	$sql = "SELECT u.nombre_unidad_academica, s.id_unidad_academica, s.id_sala, s.codigo_sala, s.nombre_sala, s.descripcion, s.semana_inicio, s.semana_fin, s.sabado_inicio, s.sabado_fin, s.domingo_inicio, s.domingo_fin, s.cantidad_reservas, s.img_sala, s.dias_previos_reserva, s.estado_sala
	FROM sala s, unidad_academica u
	WHERE s.estado_sala = 'S'
	AND s.id_unidad_academica = $id_sede
	AND u.id_unidad_academica = $id_sede
	ORDER BY s.nombre_sala ASC";
	$consulta = mysqli_query($conexion, $sql);
	$respuesta = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
	mysqli_close($conexion);
	return $respuesta;
}