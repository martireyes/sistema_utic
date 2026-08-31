<?php
require 'clases/conexion.php';

session_start();

switch ($_REQUEST['accion']) {
    case 1:
        $sql="insert into proveedor (prv_cod, prv_ruc, prv_razonsocial, prv_direccion, prv_telefono)"
        . "values ((select coalesce(max(prv_cod), 0) + 1 from proveedor),'".$_REQUEST['vprv_ruc']."','".$_REQUEST['vprv_razonsocial']."','".$_REQUEST['vprv_direccion']."','".$_REQUEST['vprv_telefono']."')";
        $mensaje='Guardado exitosamente';
        break;
    case 2:
        $sql="update proveedor set prv_ruc='".$_REQUEST['vprv_ruc']."', prv_razonsocial='".$_REQUEST['vprv_razonsocial']."', prv_direccion='".$_REQUEST['vprv_direccion']."', prv_telefono='".$_REQUEST['vprv_telefono']."' where prv_cod=".$_REQUEST['vprv_cod'];
        $mensaje='Actualizado exitosamente';
        break;
    case 3:
        $sql="delete from proveedor where prv_cod =".$_REQUEST['vprv_cod'];
        $mensaje='Eliminado exitosamente';
        break;
}

if (consultas::ejecutar_sql($sql)) {
    $_SESSION['mensaje']=$mensaje;
    header("location: proveedores_index.php");
} else {
    $_SESSION['mensaje']="Error ". $sql;
    header("location: proveedores_index.php");
}
?>