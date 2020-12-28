<?php
// session_start();
require_once('../SQL/ListarSedesSQL.php');

$consulta = ListarSedesSQL();
$unidades = [];

if ($consulta) {
    for ($i = 0; $i < sizeof($consulta); $i++) {
        $unidades[$i]['id']    = $consulta[$i]['id_unidad_academica'];
        $unidades[$i]['nombre'] = $consulta[$i]['nombre_unidad_academica'];
        $unidades[$i]['estado'] = $consulta[$i]['estado_unidad_academica'];
        $unidades[$i]['img'] = $consulta[$i]['img_unidad_academica'];
        $unidades[$i]['descripcion'] = $consulta[$i]['descripcion_unidad_academica'];
    }
    echo json_encode(['sedes' => $unidades]);
} else {
    http_response_code(404);
}
