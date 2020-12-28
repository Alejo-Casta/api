<?php
// session_start();
require_once('../SQL/ListarEquiposPorSalaSQL.php');

//Variables Globales
$id = $_GET['id'];
$consulta = ListarEquiposPorSalaSQL($id);
$equipos = [];

if ($consulta) {
    for ($i = 0; $i < sizeof($consulta); $i++) {
        $equipos[$i]['codigo'] = $consulta[$i]['codigo_equipo'];
        $equipos[$i]['nombre'] = $consulta[$i]['nombre_equipo'];
        $equipos[$i]['estado'] = $consulta[$i]['estado_equipo'];
        $equipos[$i]['id_sala']    = $consulta[$i]['id_sala'];
        $equipos[$i]['nombre_sala']    = $consulta[$i]['nombre_sala'];
    }
    echo json_encode(['equipos' => $equipos]);
} else {
    http_response_code(404);
}
