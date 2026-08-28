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
                                <h3 class="box-title">Cargos</h3>
                                <div class="box-tools">
                                    <a href="cargo_add.php" class="btn btn-primary pull-right btn-sm">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="box-body no-padding">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 col-lg-12">
                                        <?php
                                        $cargo = consultas::get_datos("select * from cargo");
                                        if (!empty($cargo)) { ?>
                                        <div class="table-responsive">
                                            <table class="table col-lg-12 col-md-12 col-xs-12 table-bordered table-striped table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th>Cargo</th>
                                                        <th class="text-center">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($cargo as $car) { ?>
                                                    <tr>
                                                        <td data-title="Descripción"><?php echo $car['car_descri'];?></td>
                                                        <td data-title="Acciones" class="text-center">
                                                            <a href="cargo_edit.php?vcar_cod=<?php echo $car['car_cod'];?>" class="btn btn-warning btn-sm" role="button" data-title = "Editar" rel="tooltip" data-placement="top">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                            </a>
                                                            <a href="cargo_del.php?vcar_cod=<?php echo $car['car_cod'];?>" class="btn btn-danger btn-sm" role="button" data-title = "Borrar" rel="tooltip" data-placement="top">
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
                                            No se han registrado cargos...
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
    <?php require __DIR__ . '/../../../menu/footer_lte.ctp'; ?>
</div>
<?php require __DIR__ . '/../../../menu/js_lte.ctp'; ?>
<script>
    $("#mensaje").delay(4000).slideUp(200, function () {
        $(this).alert('close');
    });
</script>
</body>
</html>