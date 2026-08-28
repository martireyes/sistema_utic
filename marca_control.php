<?php
require 'clases/conexion.php';

session_start();

switch ($_REQUEST['accion']) {
    case 1:
        $sql="insert into marca (mar_cod, mar_descri)"
        . "values ((select coalesce(max(mar_cod), 0) + 1 from marca),'".$_REQUEST['vmar_descri']."')";
        $mensaje='Guardado exitosamente';
        break;
    case 2:
        $sql="update marca set mar_descri='".$_REQUEST['vmar_descri']."' where mar_cod=".$_REQUEST['vmar_cod'];
        $mensaje='Actualizado exitosamente';
        break;
    case 3:
        $sql="delete from marca where mar_cod =".$_REQUEST['vmar_cod'];
        $mensaje='Eliminado exitosamente';
        break;
}

if (consultas::ejecutar_sql($sql)) {
    $_SESSION['mensaje']=$mensaje;
    header("location: marca_index.php");
} else {
    $_SESSION['mensaje']="Error ". $sql;
    header("location: marca_index.php");
}
?>