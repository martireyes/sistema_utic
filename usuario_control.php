<?php
require 'clases/conexion.php';

session_start();

$claveHash = '';
if (!empty($_REQUEST['vusr_pass'])) {
    $claveHash = password_hash($_REQUEST['vusr_pass'], PASSWORD_BCRYPT);
}

switch ($_REQUEST['accion']) {
    case 1:
        $sql="insert into usuarios (usu_cod, usu_nick, usu_clave, emp_cod, gru_cod, id_sucursal) "
        . "values ((select coalesce(max(usu_cod), 0) + 1 from usuarios),'".$_REQUEST['vusr_nick']."','".$claveHash."','".$_REQUEST['vusr_empleado']."','".$_REQUEST['vusr_grupo']."','".$_REQUEST['vusr_sucursal']."')";
        $mensaje='Guardado exitosamente';
        break;
    case 2:
        if (!empty($_REQUEST['vusr_pass'])) {
        $sql="update usuarios set usu_nick='".$_REQUEST['vusr_nick']."', usu_clave='".$claveHash."' where usu_cod='".$_REQUEST['vusr_cod']."'";
        } else {
            $sql="update usuarios set usu_nick='".$_REQUEST['vusr_nick']."' where usu_cod='".$_REQUEST['vusr_cod']."'";
        }
        $mensaje='Actualizado exitosamente';
        break;
    case 3:
        $sql="delete from usuarios where usu_cod = '".$_REQUEST['vusr_cod']."'";
        $mensaje='Eliminado exitosamente';
        break;
}

if (consultas::ejecutar_sql($sql)) {
    $_SESSION['mensaje']=$mensaje;
    header("location: usuario_index.php");
} else {
    $_SESSION['mensaje']="Error ". $sql;
    header("location: usuario_index.php");
}
?>