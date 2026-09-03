<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>LP3</title>
        <meta content="width=device-width, initial-scale=1, user-scalable=yes" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" type="image/x-icon" href="img/venta.png">
        <?php
        session_start();
        require 'menu/css_lte.ctp'; ?>
    </head>
    <body class="sidebar-expand-lg layout-fixed">
        <div class="app-wrapper">
            <?php require 'menu/header_lte.ctp'; ?>
            <?php require 'menu/toolbar_lte.ctp';?>
            <main class="app-main">
            </main>
            <?php require 'menu/footer_lte.ctp'; ?>  
        </div>                  
        <?php require 'menu/js_lte.ctp'; ?>
    </body>
</html>