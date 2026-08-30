<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
        <title>LP3</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" type="image/x-icon" href="img/venta.png">
        <?php
        session_start();
        require 'menu/css_lte.ctp'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php require 'menu/header_lte.ctp'; ?>
        <?php require 'menu/toolbar_lte.ctp';?>
        <div class="content-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="ion ion-plus"></i>
                                <h3 class="box-title">Agregar Usuarios</h3>
                                <div class="box-tools">
                                    <a href="usuario_index.php" class="btn btn-primary pull-right btn-sm">
                                        <i class="fa fa-arrow-left"></i>
                                    </a>
                                </div>
                            </div>
                            <form action="usuario_control.php" method="post" accept-charset="utf-8" class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <input type="hidden" name="accion" value="1">
                                        <label class="col-lg-2 control-label">User Name</label>
                                        <div class="col-lg-5">
                                            <input type="text" name="vusr_nick" class="form-control" required autofocus="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="accion" value="1">
                                        <label class="col-lg-2 control-label">Empleado</label>
                                        <div class="col-lg-5">
                                            <select name="vusr_empleado" class="form-control" required>
                                                <option value="">Seleccione un empleado</option>
                                                <?php
                                                $empleados = consultas::get_datos("SELECT emp_cod, emp_nombre, emp_apellido, emp_direcc FROM empleado ORDER BY emp_nombre");
                                                foreach ($empleados as $empleado) {
                                                    echo "<option value='".$empleado['emp_cod']."'>".$empleado['emp_nombre']." ".$empleado['emp_apellido']."</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="accion" value="1">
                                        <label class="col-lg-2 control-label">Grupo de empleados</label>
                                        <div class="col-lg-5">
                                            <select name="vusr_grupo" class="form-control" required>
                                                <option value="">Seleccione un grupo</option>
                                                <?php
                                                $grupos = consultas::get_datos("SELECT gru_cod, gru_nombre FROM grupos ORDER BY gru_nombre");
                                                foreach ($grupos as $grupo) {
                                                    echo "<option value='".$grupo['gru_cod']."'>".$grupo['gru_nombre']."</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="accion" value="1">
                                        <label class="col-lg-2 control-label">Password</label>
                                        <div class="col-lg-5">
                                            <input type="password" name="vusr_pass" class="form-control" required autofocus="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="accion" value="1">
                                        <label class="col-lg-2 control-label">Sucursal</label>
                                        <div class="col-lg-5">
                                            <select name="vusr_sucursal" class="form-control" required>
                                                <option value="">Seleccione una sucursal</option>
                                                <?php
                                                $sucursales = consultas::get_datos("SELECT id_sucursal, suc_descri FROM sucursal ORDER BY suc_descri");
                                                foreach ($sucursales as $sucursal) {
                                                    echo "<option value='".$sucursal['id_sucursal']."'>".$sucursal['suc_descri']."</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary pull-right">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'menu/footer_lte.ctp'; ?>
</div>
<?php require 'menu/js_lte.ctp'; ?>
</body>
</html>