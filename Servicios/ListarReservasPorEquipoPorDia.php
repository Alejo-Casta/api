<?php
// session_start();
require_once('../SQL/ListarReservasPorEquipoPorDiaSQL.php');

//Variables Globales
$equipo = $_GET['equipo'];
$fecha = $_GET['fecha'];
$fecha_actual = Date("Y-m-d H:i:s", $fecha);
$fecha_mañana = date("Y-m-d 00:00:00", $fecha + 86400);
$consulta = ListarReservasPorEquipoPorDiaSQL($equipo, $fecha_actual, $fecha_mañana);
$reservas = [];

if ($consulta) {
    for ($i = 0; $i < sizeof($consulta); $i++) {
        $reservas[$i]['id'] = $consulta[$i]['id_reserva'];
        $reservas[$i]['id_sala'] = $consulta[$i]['id_sala'];
        $reservas[$i]['codigo_equipo'] = $consulta[$i]['codigo_equipo'];
        $reservas[$i]['tipo_reserva'] = $consulta[$i]['tipo_reserva'];
        $reservas[$i]['hora_inicio'] = $consulta[$i]['hora_inicio'];
        $reservas[$i]['hora_fin'] = $consulta[$i]['hora_fin'];
        $reservas[$i]['usuario'] = $consulta[$i]['usuario_reserva'];
        $reservas[$i]['estado'] = $consulta[$i]['estado_reserva'];
        $reservas[$i]['computador_utilizado'] = $consulta[$i]['computador_utilizado'];
    }
    echo json_encode(['reservas' => $reservas]);
} else {
    http_response_code(404);
}
