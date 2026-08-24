<?php
require 'clases/conexion.php';

$sql="insert into marca (mar_cod, mar_descri)"
. "values ((select coalesce(max(mar_cod), 0) + 1 from marca),'".$_REQUEST['vmar_descri']."')";

session_start();
if (consultas::ejecutar_sql($sql)) {
    $_SESSION['mensaje']="Marca registrada correctamente";
    header("location: marca_index.php");
} else {
    $_SESSION['mensaje']="Error al registrar \n". $sql;
    header("location: marca_index.php");
}