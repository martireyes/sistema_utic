<?php
/*require './clases/conexion.php';
$sql="select * from v_usuarios where usu_nick= '".$_REQUEST['usuario']."' and usu_clave = '".$_REQUEST['clave']."'";
$resultado=consultas::get_datos($sql);
session_start();

if ($resultado[0]['usu_cod']==null){
    $_SESSION['error']='Usuario o contraseña incorrectos';
    header('location:index.php');
}else{
    $_SESSION['usu_cod']=$resultado[0]['usu_cod'];
    $_SESSION['usu_nick']=$resultado[0]['usu_nick'];
    $_SESSION['usu_fot']=$resultado[0]['usu_fot'];
    $_SESSION['emp_cod']=$resultado[0]['emp_cod'];
    $_SESSION['nombres']=$resultado[0]['empleado'];
    $_SESSION['cargo']=$resultado[0]['car_descri'];
    $_SESSION['gru_cod']=$resultado[0]['gru_cod'];
    $_SESSION['grupo']=$resultado[0]['gru_nombre'];
    $_SESSION['id_sucursal']=$resultado[0]['id_sucursal'];
    $_SESSION['sucursal']=$resultado[0]['suc_descri'];
    header('location:menu.php');
}*/
 
require './clases/conexion.php';
session_start();

$usuarioIngresado = $_REQUEST['usuario'] ?? '';
$claveIngresada = $_REQUEST['clave'] ?? '';

// 1. Buscar al usuario únicamente por su nick
$sql = "SELECT * FROM v_usuarios WHERE usu_nick = '" . $usuarioIngresado . "' LIMIT 1";
$resultado = consultas::get_datos($sql);

// 2. Verificar si el usuario existe y si la contraseña coincide con password_verify
if (!empty($resultado) && isset($resultado[0]['usu_clave']) && password_verify($claveIngresada, $resultado[0]['usu_clave'])) {
    
    // ¡Contraseña correcta! Iniciar sesión y guardar variables
    $_SESSION['usu_cod']     = $resultado[0]['usu_cod'];
    $_SESSION['usu_nick']    = $resultado[0]['usu_nick'];
    $_SESSION['usu_foto']     = $resultado[0]['usu_foto'];
    $_SESSION['emp_cod']     = $resultado[0]['emp_cod'];
    $_SESSION['nombres']     = $resultado[0]['empleado'];
    $_SESSION['cargo']       = $resultado[0]['car_descri'];
    $_SESSION['gru_cod']     = $resultado[0]['gru_cod'];
    $_SESSION['grupo']       = $resultado[0]['gru_nombre'];
    $_SESSION['id_sucursal'] = $resultado[0]['id_sucursal'];
    $_SESSION['sucursal']    = $resultado[0]['suc_descri'];
    
    header('Location: menu.php');
    exit();

} else {
    // Si el usuario no existe o la contraseña es incorrecta
    $_SESSION['error'] = 'Usuario o contraseña incorrectos';
    header('Location: index.php');
    exit();
}