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
                                <h3 class="box-title">Agregar Clientes</h3>
                                <div class="box-tools">
                                    <a href="clientes_index.php" class="btn btn-primary pull-right btn-sm">
                                        <i class="fa fa-arrow-left"></i>
                                    </a>
                                </div>
                            </div>
                            <form action="clientes_control.php" method="post" accept-charset="utf-8" class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <input type="hidden" name="accion" value="1">
                                        <label class="col-lg-2 control-label">Cédula</label>
                                        <div class="col-lg-5">
                                            <input type="text" name="vcli_ci" class="form-control" required autofocus="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="accion" value="1">
                                        <label class="col-lg-2 control-label">Nombre</label>
                                        <div class="col-lg-5">
                                            <input type="text" name="vcli_nombre" class="form-control" required autofocus="">
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type=="submit" class="btn btn-primary pull-right">Registrar</button>
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