<?php
session_start();
if ($_SESSION){
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <script>
        (() => {'use strict';const root = document.documentElement;
        if (root.getAttribute('data-lte-color-mode') === 'off') {
          return;
        }
        const STORAGE_KEY = 'lte-theme';
        let stored = null;
        try {
          stored = localStorage.getItem(STORAGE_KEY);
        } catch {
        }
        const authored = root.getAttribute('data-bs-theme');
        let resolved = 'light';
        if (stored === 'dark' || stored === 'light') {
          resolved = stored;
        } else if (authored === 'dark' || authored === 'light') {
          resolved = authored;
        } else if (globalThis.matchMedia('(prefers-color-scheme: dark)').matches) {
          resolved = 'dark';
        }
        root.setAttribute('data-bs-theme', resolved);
        root.style.colorScheme = resolved;
        if (resolved !== authored) {
          root.setAttribute('data-lte-theme-resolved', '');
        }
        })();
        </script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>LP3 | Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes"/>
        <meta name="color-scheme" content="light dark" />
        <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
        <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
        <link rel="shortcut icon" type="image/x-icon" href="img/venta.png">
        <meta name="title" content="LP3 | Login" />
        <meta name="author" content="ColorlibHQ" />
        <meta name="supported-color-schemes" content="light dark" />
        <link rel="preload" href="css/adminlte.css" as="style" />
        <link rel="stylesheet" href="css/source-sans-3.css" />
        <link rel="stylesheet" href="css/overlayscrollbars.min.css" />
        <link rel="stylesheet" href="css/bootstrap-icons.min.css" />
        <link rel="stylesheet" href="css/adminlte.css" />
    </head>
    <body class="login-page bg-body-secondary">
        <main class="login-box">    
        <h1 class="login-logo">
            <a href="#"><b>Compra | Venta</b></a>
        </h1>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Iniciar sesión con su usuario</p>

                <form action="acceso.php" method="post">
                     <label class="visually-hidden" for="loginEmail">Usuario</label>
                     <div class="input-group mb-3">
                        <input id="usuario" type="text" class="form-control" placeholder="Usuario" />
                        <div class="input-group-text">
                            <span class="bi bi-envelope"></span>
                        </div>
                    </div>
                    <label class="visually-hidden" for="loginPassword">Password</label>
                    <div class="input-group mb-3">
                        <input id="clave" type="password" class="form-control" placeholder="Password" />
                        <div class="input-group-text">
                            <span class="bi bi-lock-fill"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                <label class="form-check-label" for="flexCheckDefault"> Remember Me </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Ingresar</button>
                            </div>
                        </div>
                    </div>




           <!--  
            <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
            <div class="checkbox">
                <label class="checkbox"><input type="checkbox" value="1" name="recuerdame"/>No cerrar sesión</label>
                <p class="help-block"><a href="#">¿No puede acceder a su cuenta?</a></p>
            </div> -->
            <?php
            //Mensaje de error
            if(!empty($_SESSION['error'])){?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="bi bi-exclamation-triangle-fill me-2"></sapn>
                <?php echo $_SESSION['error']; ?>
            </div>
            <?php } ?>
        </form>
            </div>
        </div>
        </main>
        <script src="js/overlayscrollbars.browser.es6.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/adminlte.js"></script>
       <!-- <script src="js/jquery-1.12.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script> -->
        <script>
            const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
            const Default = {
                scrollbarTheme: 'os-theme-light',
                scrollbarAutoHide: 'leave',
                scrollbarClickScroll: true,
            };
            document.addEventListener('DOMContentLoaded', function () {
                const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
                const isMobile = window.innerWidth <= 992;
                if (
                    sidebarWrapper &&
                    OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
                    !isMobile
                ) {
                    OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                        scrollbars: {
                            theme: Default.scrollbarTheme,
                            autoHide: Default.scrollbarAutoHide,
                            clickScroll: Default.scrollbarClickScroll,
                        },
                    });
                }
            });
            </script>
            <script>
            (() => {
                'use strict';
                const mode = () =>
                document.documentElement.getAttribute('data-bs-theme') === 'dark' ? 'dark' : 'light';
                globalThis.Apex ||= {};
                const apex = globalThis.Apex;
                apex.theme = { mode: mode() };
                apex.chart = Object.assign(apex.chart || {}, { background: 'transparent' });
                new MutationObserver(() => {
                    const next = mode();
                    apex.theme = { mode: next };
                    const instances = apex._chartInstances || [];
                    for (const { chart } of instances) {
                        chart.updateOptions({ theme: { mode: next } }, false, false);
                    }
                }).observe(document.documentElement, {
                    attributes: true,
                    attributeFilter: ['data-bs-theme'],
                });
            })();
            </script>
    </body>
</html>