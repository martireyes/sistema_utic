<?php
require '../../clases/conexion.php';
header('Content-Type: application/json');

$cargos = consultas::get_datos("SELECT car_cod, car_descri FROM cargo ORDER BY car_descri");
echo json_encode($cargos);