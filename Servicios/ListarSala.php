<?php
// session_start();
require_once('../SQL/ListarSalaSQL.php');

$id = $_GET['id'];
$consulta = ListarSalaSQL($id);
$salas = [];

if ($consulta) {
    for ($i = 0; $i < sizeof($consulta); $i++) {
        $salas[$i]['id']    = $consulta[$i]['id_sala'];
        $salas[$i]['codigo'] = $consulta[$i]['codigo_sala'];
        $salas[$i]['nombre'] = $consulta[$i]['nombre_sala'];
        $salas[$i]['descripcion'] = $consulta[$i]['descripcion'];
        $salas[$i]['semana_inicio'] = $consulta[$i]['semana_inicio'];
        $salas[$i]['semana_fin'] = $consulta[$i]['semana_fin'];
        $salas[$i]['sabado_inicio'] = $consulta[$i]['sabado_inicio'];
        $salas[$i]['sabado_fin'] = $consulta[$i]['sabado_fin'];
        $salas[$i]['domingo_inicio'] = $consulta[$i]['domingo_inicio'];
        $salas[$i]['domingo_fin'] = $consulta[$i]['domingo_fin'];
        $salas[$i]['cantidad_reservas'] = $consulta[$i]['cantidad_reservas'];
        $salas[$i]['estado'] = $consulta[$i]['estado_sala'];
        $salas[$i]['img'] = $consulta[$i]['img_sala'];
        $salas[$i]['dias_previos_reserva'] = $consulta[$i]['dias_previos_reserva'];
        $salas[$i]['id_unidad_academica'] = $consulta[$i]['id_unidad_academica'];
    }
    echo json_encode(['salas' => $salas]);
} else {
    http_response_code(404);
}
