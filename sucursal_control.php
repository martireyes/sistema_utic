<?php
require 'clases/conexion.php';

session_start();

switch ($_REQUEST['accion']) {
    case 1:
        $sql="insert into sucursal (id_sucursal, suc_descri)"
        . "values ((select coalesce(max(id_sucursal), 0) + 1 from sucursal),'".$_REQUEST['vsuc_descri']."')";
        $mensaje='Guardado exitosamente';
        break;
    case 2:
        $sql="update sucursal set suc_descri='".$_REQUEST['vsuc_descri']."' where id_sucursal=".$_REQUEST['vsuc_cod'];
        $mensaje='Actualizado exitosamente';
        break;
    case 3:
        $sql="delete from sucursal where id_sucursal =".$_REQUEST['vsuc_cod'];
        $mensaje='Eliminado exitosamente';
        break;
}

if (consultas::ejecutar_sql($sql)) {
    $_SESSION['mensaje']=$mensaje;
    header("location: sucursal_index.php");
} else {
    $_SESSION['mensaje']="Error ". $sql;
    header("location: sucursal_index.php");
}
?>