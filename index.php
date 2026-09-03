<?php
session_start();
if ($_SESSION){
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>LP3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="shortcut icon" type="image/x-icon" href="img/venta.png">
        <style>
            body{
                padding-top: 40px;
                padding-bottom: 40px;
            }
            body,html{
                background: url(img/fondo.jpg) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                
            }
            .login{
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
                
            }
            #sha{
                max-width: 340px;
                -webkit-box-shadow: 0px 0px 18px 0px rgba(48,50,50,0.48);
                -moz-box-shadow:0px 0px 18px 0px rgba(48,50,50,0.48);
                box-shadow: 0px 0px 18px 0px rgba(48,50,50,0.48);
                border-radius: 6%;
                
            }
            #avatar{
                width: 96px;
                height: 96px;
                margin: 0px auto 10px;
                display: block;
                border-radius: 50%;
            }
        </style>
    </head>
    <body>
        <div class="container wll" id="sha">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <img src="img/user.png" class="img-responsive" id="user"/>
                </div>
            </div>
            <form class="login" action="acceso.php" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="usuario" required="" autofocus="" placeholder="Ingrese su usuario"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="clave" required="" autofocus="" placeholder="Ingrese su clave"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesi&oacute;n</button>
                <div class="checkbox">
                    <label class="checkbox"><input type="checkbox" value="1" name="recuerdame"/>No cerrar sesión</label>
                    <p class="help-block"><a href="#">¿No puede acceder a su cuenta?</a></p>
                </div>
                <?php
                //Mensaje de error
                if(!empty($_SESSION['error'])){?>
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign"></span>
                    <?php echo $_SESSION['error']; ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign"></span>
                        Error de inicio
                    
                 </div>
                </div>
                <?php } ?>
            </form>
        </div>
        <script src="js/jquery-1.12.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>