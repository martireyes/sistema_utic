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
                                <i class="ion ion-trash-b"></i>
                                <h3 class="box-title">Eliminar Usuarios</h3>
                                <div class="box-tools">
                                    <a href="usuario_index.php" class="btn btn-primary pull-right btn-sm">
                                        <i class="fa fa-arrow-left"></i>
                                    </a>
                                </div>
                            </div>
                            <form action="usuario_control.php" method="post" accept-charset="utf-8" class="form-horizontal">
                                <div class="box-body">
                                    <?php $resultado=consultas::get_datos("select * from usuarios" . " where usu_cod=".$_GET['vusr_cod'])?>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">User Name</label>
                                        <div class="col-lg-10">
                                            <input type="hidden" name="accion" value="3">
                                            <input type="hidden" name="vusr_cod" value="<?php echo $resultado[0]['usu_cod'];?>">
                                            <input type="text" class="form-control" name="vusr_nick" value="<?php echo $resultado[0]['usu_nick'];?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Empleado</label>
                                        <div class="col-lg-10">
                                            <input type="hidden" name="accion" value="3">
                                            <input type="hidden" name="vusr_cod" value="<?php echo $resultado[0]['usu_cod']?>">
                                            <select name="vusr_empleado" class="form-control" required disabled>
                                                <?php
                                                $empleados = consultas::get_datos("SELECT emp_cod, emp_nombre FROM empleado ORDER BY emp_nombre");
                                                foreach ($empleados as $empleado) {
                                                    $selected = ($empleado['emp_cod'] ==
                                                    $resultado[0]['emp_cod'])? 'selected': '';
                                                    echo "<option value='".$empleado['emp_cod']."'
                                                    $selected>". $empleado['emp_nombre']. "</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o"></i> Eliminar</button>
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