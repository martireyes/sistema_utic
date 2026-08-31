<?php
require 'clases/conexion.php';

session_start();

switch ($_REQUEST['accion']) {
    case 1:
        $sql="insert into grupos (gru_cod, gru_nombre)"
        . "values ((select coalesce(max(gru_cod), 0) + 1 from grupos),'".$_REQUEST['vgru_nombre']."')";
        $mensaje='Guardado exitosamente';
        break;
    case 2:
        $sql="update grupos set gru_nombre='".$_REQUEST['vgru_nombre']."' where gru_cod=".$_REQUEST['vgru_cod'];
        $mensaje='Actualizado exitosamente';
        break;
    case 3:
        $sql="delete from grupos where gru_cod =".$_REQUEST['vgru_cod'];
        $mensaje='Eliminado exitosamente';
        break;
}

if (consultas::ejecutar_sql($sql)) {
    $_SESSION['mensaje']=$mensaje;
    header("location: grupo_index.php");
} else {
    $_SESSION['mensaje']="Error ". $sql;
    header("location: grupo_index.php");
}
?>