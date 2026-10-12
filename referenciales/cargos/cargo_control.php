<?php
require '../../clases/conexion.php';

session_start();

switch ($_REQUEST['accion']) {
    case 1:
        $sql="insert into cargo (car_cod, car_descri, created_at, car_estado) "
        . "values ((select coalesce(max(car_cod), 0) + 1 from cargo),'".$_REQUEST['vcar_descri']."', NOW(), '".$_REQUEST['vcar_estado']."')";
        $mensaje='Guardado exitosamente';
        break;
    case 2:
        $sql="update cargo set car_descri='".$_REQUEST['vcar_descri']."', updated_at=NOW(),'".$_REQUEST['vcar_descri']."' where car_cod=".$_REQUEST['vcar_cod'];
        $mensaje='Actualizado exitosamente';
        break;
    case 3:
        $sql="delete from cargo where car_cod =".$_REQUEST['vcar_cod'];
        $mensaje='Eliminado exitosamente';
        break;
}

if (consultas::ejecutar_sql($sql)) {
    $_SESSION['mensaje']=$mensaje;
    header("Location: /sistema_utic/menu.php?ruta=referenciales/cargos/cargo_index.php");
    exit;
} else {
    $_SESSION['mensaje']="Error ". $sql;
    header("Location: /sistema_utic/menu.php?ruta=referenciales/cargos/cargo_index.php");
    exit;
}
?>