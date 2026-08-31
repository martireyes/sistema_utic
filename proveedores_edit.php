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
                                <h3 class="box-title">Editar Proveedores</h3>
                                <div class="box-tools">
                                    <a href="proveedores_index.php" class="btn btn-primary pull-right btn-sm">
                                        <i class="fa fa-arrow-left"></i>
                                    </a>
                                </div>
                            </div>
                            <form action="proveedores_control.php" method="post" accept-charset="utf-8" class="form-horizontal">
                                <div class="box-body">
                                    <?php $resultado=consultas::get_datos("select * from proveedor" . " where prv_cod=".$_GET['vprv_cod'])?>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">RUC</label>
                                        <div class="col-lg-10">
                                            <input type="hidden" name="accion" value="2">
                                            <input type="hidden" name="vprv_cod" value="<?php echo $resultado[0]['prv_cod']?>">
                                            <input type="text" class="form-control" name="vprv_ruc" value="<?php echo $resultado[0]['prv_ruc']?>" required autofocus="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Razón Social</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="vprv_razonsocial" value="<?php echo $resultado[0]['prv_razonsocial']?>" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Dirección</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="vprv_direccion" value="<?php echo $resultado[0]['prv_direccion']?>" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Teléfono</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="vprv_telefono" value="<?php echo $resultado[0]['prv_telefono']?>" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o"></i> Modificar</button>
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