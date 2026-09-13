<!--Inicio::Barra de navegación-->
<form class="navbar-search d-none d-md-block ms-3" role="search" action="./pages/search-results.html">
    <label for="navbar-search-input" class="visually-hidden">Buscar</label>
    <div class="navbar-search-field">
        <input type="search" id="navbar-search-input" name="q" class="form-control" placeholder="Buscar…" autocomplete="off" />
        <button class="navbar-search-submit" type="submit" aria-label="Submit search">
            <i class="bi bi-search" aria-hidden="true"></i>
        </button>
    </div>
</form>
<!--Fin::Barra de navegación-->
<!--Inicio::Menu de usuario-->
<ul class="navbar-nav ms-auto">
    <!--Inicio::Resultados de busqueda-->
    <li class="nav-item d-md-none">
        <a class="nav-link" href="#" aria-label="Buscar">
            <i class="bi bi-search" aria-hidden="true"></i>
        </a>
    </li>
    <!--Fin::Resultados de busqueda-->
    <!--Inicio::Full pantalla-->
    <li class="nav-item">
        <a class="nav-link" href="#" data-lte-toggle="fullscreen" aria-label="Toggle fullscreen" >
            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit d-none"></i>
        </a>
    </li>
    <!--Fin::Full pantalla-->
    <!--Inicio::Temas-->
    <li class="nav-item dropdown">
        <a class="nav-link" href="#" id="bd-theme" aria-label="Toggle color scheme" data-bs-toggle="dropdown" aria-expanded="false" >
            <i class="bi bi-sun-fill" data-lte-theme-icon="light"></i>
            <i class="bi bi-moon-fill d-none" data-lte-theme-icon="dark"></i>
            <i class="bi bi-circle-half d-none" data-lte-theme-icon="auto"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme" style="--bs-dropdown-min-width: 8rem" >
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false" > 
                    <i class="bi bi-sun-fill me-2"></i>
                    Light
                    <i class="bi bi-check-lg ms-auto d-none"></i>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false" >
                    <i class="bi bi-moon-fill me-2"></i>
                    Dark
                    <i class="bi bi-check-lg ms-auto d-none"></i>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true" >
                    <i class="bi bi-circle-half me-2"></i>
                    Auto
                    <i class="bi bi-check-lg ms-auto d-none"></i>
                </button>
            </li>
        </ul>
    </li>
    <!--Fin::Temas-->
    <!--Inicio::Menu de usuario desplegable-->
    <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <img src="<?php if(!empty($_SESSION['usu_foto'])){ echo $_SESSION['usu_foto'];}else{ echo "img/no_disponible.jpg";}?>" class="user-image rounded-circle shadow" alt="Usuario">
            <span class="d-none d-md-inline"><?php echo $_SESSION['usu_nick'];?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
            <!--Inicio::Imagen de usuario-->
            <li class="user-header text-bg-primary">
                <img src="<?php if(!empty($_SESSION['usu_foto'])){ echo $_SESSION['usu_foto'];}else{ echo "img/no_disponible.jpg";}?>" class="rounded-circle shadow" alt="Usuario">
                        <p>
                            <?php echo $_SESSION['nombres'];?>
                            <small>Cargo: <?php if(!empty($_SESSION['cargo'])){ echo $_SESSION['cargo'];}else{ echo "No especificado";}?></small>
                        </p>
            </li>
            <!--Fin::Imagen de usuario-->
            <!--Inicio::Opciones de usuario-->
            <li class="user-footer">
                <a href="perfil.php" class="btn btn-outline-secondary">Perfil</a>
                <a href="index.php" class="btn btn-outline-danger float-end">Salir</a>
            </li>
            <!--Fin::Opciones de usuario-->
        </ul>
    </li>
    <!--Fin::Menu de usuario desplegable-->
</ul>
<!--Fin::Menu de usuario-->