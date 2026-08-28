<?php
require 'clases/conexion.php';

session_start();

switch ($_REQUEST['accion']) {
    case 1:
        $sql="insert into deposito (dep_cod, dep_descri, id_sucursal) "
        . "values ((select coalesce(max(dep_cod), 0) + 1 from deposito),'".$_REQUEST['vdep_descri']."','".$_REQUEST['vdep_sucursal']."')";
        $mensaje='Guardado exitosamente';
        break;
    case 2:
        $sql="update deposito set dep_descri='".$_REQUEST['vdep_descri']."', id_sucursal='".$_REQUEST['vdep_sucursal']."' where dep_cod=".$_REQUEST['vdep_cod'];
        $mensaje='Actualizado exitosamente';
        break;
    case 3:
        $sql="delete from deposito where dep_cod =".$_REQUEST['vdep_cod'];
        $mensaje='Eliminado exitosamente';
        break;
}

if (consultas::ejecutar_sql($sql)) {
    $_SESSION['mensaje']=$mensaje;
    header("location: deposito_index.php");
} else {
    $_SESSION['mensaje']="Error ". $sql;
    header("location: deposito_index.php");
}
?>