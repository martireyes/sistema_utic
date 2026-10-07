<?php
require_once './clases/conexion.php';

$conexion = Conectar::con();
$token = $_GET['token'] ?? '';
$error = "";
$exito = false;

// 1. Validar que el token sea válido, no haya expirado y no haya sido usado
$sql = "SELECT tok_cod, usu_cod FROM tokens 
        WHERE token = $1 AND tok_expira > NOW() AND tok_usado = FALSE LIMIT 1";
$res = pg_query_params($conexion, $sql, array($token));

if (!$res || pg_num_rows($res) == 0) {
    die("El enlace de recuperación es inválido o ha expirado.");
}

$datosToken = pg_fetch_assoc($res);

// 2. Procesar el cambio de contraseña
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevaClave = $_POST['password'] ?? '';
    $confirmarClave = $_POST['confirm_password'] ?? '';

    if (empty($nuevaClave) || strlen($nuevaClave) < 6) {
        $error = "La contraseña debe tener al menos 6 caracteres.";
    } elseif ($nuevaClave !== $confirmarClave) {
        $error = "Las contraseñas no coinciden.";
    } else {
        // Encriptar la nueva clave
        $claveHash = password_hash($nuevaClave, PASSWORD_BCRYPT);

        // Actualizar la contraseña del usuario en la tabla 'usuarios'
        $sqlUpdate = "UPDATE usuarios SET usu_clave = $1 WHERE usu_cod = $2";
        pg_query_params($conexion, $sqlUpdate, array($claveHash, $datosToken['usu_cod']));

        // Marcar el token como usado
        $sqlUsed = "UPDATE tokens SET tok_usado = TRUE WHERE tok_cod = $1";
        pg_query_params($conexion, $sqlUsed, array($datosToken['tok_cod']));

        $exito = true;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <title>LP3 | Nueva Contraseña</title>
    <script>
      (() => {
        'use strict';
        const root = document.documentElement;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <meta name="title" content="LP3 | Clave Olvidada" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="shortcut icon" type="image/x-icon" href="img/venta.png">
    <link rel="preload" href="css/adminlte.css" as="style" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" media="print" onload="this.media = 'all'" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/adminlte.css" />
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <main class="app-main">
        <div class="tab-pane fade" id="security" role="tabpanel">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>LP3</b> | Recuperar Clave</h3>
                </div>
                <?php if ($exito): ?>
                <div class="alert alert-success">
                    ¡Contraseña actualizada con éxito! Ya puedes <a href="index.php">iniciar sesión</a>.
                </div>
                <?php else: ?>
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                <div class="card-body">
                <form class="row g-3" method="POST">
                    <div class="col-md-6">
                        <label class="form-label" for="pwd-new">Nueva Contraseña</label>
                        <input id="pwd-new" type="password" name="password" class="form-control" placeholder="Nueva Contraseña" required />
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Actualizar Clave</button>
                    </div>
                </form>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous" ></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="js/adminlte/js/adminlte.js"></script>
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