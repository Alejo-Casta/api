<?php
require_once('../Conexion.php');

function ListarSalaSQL($id)
{
	$conexion = Connect();
	$sql = "SELECT *
	FROM sala
	WHERE id_sala = '$id'";
	$consulta = mysqli_query($conexion, $sql);
	$respuesta = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
	mysqli_close($conexion);
	return $respuesta;
}