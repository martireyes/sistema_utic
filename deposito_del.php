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
                                <h3 class="box-title">Eliminar Depósitos</h3>
                                <div class="box-tools">
                                    <a href="deposito_index.php" class="btn btn-primary pull-right btn-sm">
                                        <i class="fa fa-arrow-left"></i>
                                    </a>
                                </div>
                            </div>
                            <form action="deposito_control.php" method="post" accept-charset="utf-8" class="form-horizontal">
                                <div class="box-body">
                                    <?php $resultado=consultas::get_datos("select * from deposito" . " where dep_cod=".$_GET['vdep_cod'])?>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Descripción</label>
                                        <div class="col-lg-10">
                                            <input type="hidden" name="accion" value="3">
                                            <input type="hidden" name="vdep_cod" value="<?php echo $resultado[0]['dep_cod'];?>">
                                            <input type="text" class="form-control" name="vdep_descri" value="<?php echo $resultado[0]['dep_descri'];?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type=="submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o"></i> Eliminar</button>
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