<?php
require_once('../Conexion.php');

function ListarSedesSQL()
{
	$conexion = Connect();
	$sql = "SELECT *
	FROM unidad_academica 
	WHERE estado_unidad_academica = 'activa'";
	$consulta = mysqli_query($conexion, $sql);
	$respuesta = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
	mysqli_close($conexion);
	return $respuesta;
}
