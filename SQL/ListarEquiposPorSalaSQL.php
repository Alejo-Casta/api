<?php
require_once('../Conexion.php');

function ListarEquiposPorSalaSQL($id_sala)
{
	$conexion = Connect();
	$sql = "SELECT c.nombre_equipo, c.codigo_equipo, c.estado_equipo, c.id_sala, s.nombre_sala
	FROM computador c, sala s
	WHERE s.id_sala = $id_sala
	AND c.id_sala = $id_sala
	ORDER BY c.nombre_equipo ASC";
	$consulta = mysqli_query($conexion, $sql);
	$respuesta = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
	mysqli_close($conexion);
	return $respuesta;
}
