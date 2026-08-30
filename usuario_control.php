<?php
require 'clases/conexion.php';

session_start();

switch ($_REQUEST['accion']) {
    case 1:
        $sql="insert into usuario (usu_cod, usu_nick, usu_clave, emp_cod, gru_cod, id_sucursal) "
        . "values ((select coalesce(max(usu_cod), 0) + 1 from usuario),'".$_REQUEST['vusr_nick']."',md5('".$_REQUEST['vusr_pass']."'),'".$_REQUEST['vusr_empleado']."','".$_REQUEST['vusr_grupo']."','".$_REQUEST['vusr_sucursal']."')";
        $mensaje='Guardado exitosamente';
        break;
    case 2:
        $sql="update usuario set usu_nick='".$_REQUEST['vusr_nick']."', usu_clave=md5('".$_REQUEST['vusr_pass']."') where usu_cod='".$_REQUEST['vusr_cod']."'";
        $mensaje='Actualizado exitosamente';
        break;
    case 3:
        $sql="delete from usuario where usu_cod = '".$_REQUEST['vusr_cod']."'";
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