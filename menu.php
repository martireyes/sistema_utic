<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>LP3 | Dashboard</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
        <meta name="color-scheme" content="light dark" />
        <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
        <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
        <meta name="title" content="AdminLTE v4 | Dashboard" />
        <meta name="author" content="ColorlibHQ" />
        <meta name="supported-color-schemes" content="light dark" />
        <link rel="shortcut icon" type="image/x-icon" href="img/venta.png">
        <?php
        session_start();
         require 'menu/css_lte.ctp'; ?>
    </head>
    <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
        <div class="app-wrapper">
            <?php require 'menu/header_lte.ctp'; ?>
            <?php require 'menu/toolbar_lte.ctp';?>
            <!--Inicio::Aplicación inicial-->
            <main class="app-main">
                <!--Inicio::Llamando la ruta del Contenido-->
                <?php
                $ruta = $_GET['ruta'] ?? 'dashboard';
                $archivo = $ruta . '.php';
                if(file_exists($archivo)){
                    include $archivo;
                    }else{
                        include 'dashboard.php';
                }
                ?>
                <!--Fin::Llamando la ruta del Contenido-->
            </main>
            <!--Fin::Aplicación inicial-->
            <!--<main class="content-wrapper">
            </main>-->
            <?php require 'menu/footer_lte.ctp'; ?>  
        </div>                  
        <?php require 'menu/js_lte.ctp'; ?>
    </body>
</html>