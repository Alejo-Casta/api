<?php
// session_start();
require_once('../SQL/ListarReservasClasePorEquipoPorDiaSQL.php');

//Variables Globales
$equipo = $_GET['equipo'];
$fecha = $_GET['fecha'];
$hoy = Date("Y-m-d H:i:s", $fecha);
echo $hoy;
$mañana = date("Y-m-d H:i:s", mktime(0, 0, 0, date("m"), date("d") + 1, date("Y")));
$consulta = ListarReservasClasePorEquipoPorDiaSQL($equipo, $hoy, $mañana);
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
    // echo json_encode(['reservas' => $reservas]);
} else {
    http_response_code(404);
}
