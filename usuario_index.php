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
                        <?php if (!empty($_SESSION['mensaje'])) { ?>
                        <div class="alert alert-danger" role="alert" id="mensaje">
                            <span class="glyphicon glyphicon-exclamation-sign"></span>
                            <?php echo $_SESSION['mensaje'];
                            $_SESSION['mensaje'] = ''; ?>
                            </div>
                            <?php } ?>
                            <div class="box box-primary">
                            <div class="box-header">
                                <i class="ion ion-clipboard"></i>
                                <h3 class="box-title">Usuarios</h3>
                                <div class="box-tools">
                                    <a href="usuario_add.php" class="btn btn-primary pull-right btn-sm">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="box-body no-padding">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 col-lg-12">
                                        <?php
                                        $usuario = consultas::get_datos("select u.usu_cod, u.usu_nick, e.emp_nombre, e.emp_apellido, g.gru_nombre, s.suc_descri from usuarios u join empleado e on u.emp_cod = e.emp_cod join grupos g on u.gru_cod = g.gru_cod join sucursal s on u.id_sucursal = s.id_sucursal");
                                        if (!empty($usuario)) { ?>
                                        <div class="table-responsive">
                                            <table class="table col-lg-12 col-md-12 col-xs-12 table-bordered table-striped table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th>Usuario</th>
                                                        <th>Nombre</th>
                                                        <th>Apellido</th>
                                                        <th>Grupo de usuarios</th>
                                                        <th>Sucursal</th>
                                                        <th class="text-center">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($usuario as $usr) { ?>
                                                    <tr>
                                                        <td data-title="Usuario"><?php echo $usr['usu_nick'];?></td>
                                                        <td data-title="Nombre"><?php echo $usr['emp_nombre'];?></td>
                                                        <td data-title="Apellido"><?php echo $usr['emp_apellido'];?></td>
                                                        <td data-title="Grupo de usuarios"><?php echo $usr['gru_nombre'];?></td>
                                                        <td data-title="Sucursal"><?php echo $usr['suc_descri'];?></td>
                                                        <td data-title="Acciones" class="text-center">
                                                            <a href="usuario_edit.php?vusr_cod=<?php echo $usr['usu_cod'];?>" class="btn btn-warning btn-sm" role="button" data-title = "Editar" rel="tooltip" data-placement="top">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                            </a>
                                                            <a href="usuario_del.php?vusr_cod=<?php echo $usr['usu_cod'];?>" class="btn btn-danger btn-sm" role="button" data-title = "Borrar" rel="tooltip" data-placement="top">
                                                                <span class="glyphicon glyphicon-trash"></span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php }else { ?>
                                        <div class="alert alert-info flat">
                                            <span class="glyphicon glyphicon-info-sign"></span>
                                            No se han registrado usuarios...
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'menu/footer_lte.ctp'; ?>
</div>
<?php require 'menu/js_lte.ctp'; ?>
<script>
    $("#mensaje").delay(4000).slideUp(200, function () {
        $(this).alert('close');
    });
</script>
</body>
</html>