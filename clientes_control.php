<?php
require 'clases/conexion.php';

session_start();

switch ($_REQUEST['accion']) {
    case 1:
        $sql="insert into clientes (cli_cod, cli_ci, cli_nombre, cli_apellido, cli_telefono, cli_direcc) "
        . "values ((select coalesce(max(cli_cod), 0) + 1 from clientes),'".$_REQUEST['vcli_ci']."','".$_REQUEST['vcli_nombre']."','".$_REQUEST['vcli_apellido']."','".$_REQUEST['vcli_telefono']."','".$_REQUEST['vcli_direccion']."')";
        $mensaje='Guardado exitosamente';
        break;
    case 2:
        $sql="update clientes set cli_ci='".$_REQUEST['vcli_ci']."', cli_nombre='".$_REQUEST['vcli_nombre']."', cli_apellido='".$_REQUEST['vcli_apellido']."', cli_telefono='".$_REQUEST['vcli_telefono']."', cli_direcc='".$_REQUEST['vcli_direccion']."' where cli_cod=".$_REQUEST['vcli_cod'];
        $mensaje='Actualizado exitosamente';
        break;
    case 3:
        $sql="delete from clientes where cli_cod =".$_REQUEST['vcli_cod'];
        $mensaje='Eliminado exitosamente';
        break;
}

if (consultas::ejecutar_sql($sql)) {
    $_SESSION['mensaje']=$mensaje;
    header("location: clientes_index.php");
} else {
   $_SESSION['mensaje']="Error ". $sql;
    header("location: clientes_index.php");
}
?>