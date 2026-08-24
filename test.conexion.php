<?php

require_once("clases/conexion.php");

$con = Conectar::connect();

if ($con) {
    echo "✅ Conexión exitosa con PostgreSQL";
} else {
    echo "❌ Error de conexión";
}