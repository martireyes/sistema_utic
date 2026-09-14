<?php require ("clases/conexion.php"); ?>
<!--Inicio::Menu lateral -->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--Inicio::Logo -->
    <div class="sidebar-brand">
        <a href="menu.php" class="brand-link">
            <!--Inicio::Imagen logo-->
            <img src="img/lp3.png" alt="LP3" class="brand-image opacity-75 shadow" />
            <!--Fin::Imagen logo-->
            <!--Inicio::Texto del logo-->
            <span class="brand-text fw-light">Compra | Venta</span>
            <!--Fin::Texto del logo-->
        </a>
    </div>
    <!-- Fin::Logo -->
    <!--Inicio::Buscador lateral-->
    <div class="sidebar-search" role="search">
        <label for="sidebar-search-input" class="visually-hidden">Filter menu</label>
        <input type="search" id="sidebar-search-input" class="form-control form-control-sm" placeholder="Buscar..." autocomplete="off" data-lte-toggle="sidebar-search" data-lte-target="#navigation" />
        <p class="fs-7 text-secondary mt-2 mb-0" data-lte-search-empty role="status" hidden>
            No se encuentran resultados.
        </p>
    </div>
    <!--Fin::Buscador lateral-->
    <!--Inicio::Envolvimiento del menú lateral-->
    <div class="sidebar-wrapper">
        <nav class="mt-2" aria-label="Main navigation">
            <!--Inicio::Menú lateral-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" data-accordion="false" id="navigation" >
                <li class="nav-item">
                    <a href="./starter.html" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php
                $modulos=consultas::get_datos("select * from modulos order by mod_cod");
                foreach ($modulos as $modulo) { ?>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon bi bi-box-arrow-in-right"></i>
                        <p><?php echo $modulo['mod_nombre']?>
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <?php
                    $paginas=consultas::get_datos("select * from paginas a join modulos b on a.mod_cod=b.mod_cod where mod_nombre='".$modulo['mod_nombre']."' order by pag_nombre");
                    ?>
                    <ul class="nav nav-treeview">
                        <?php  foreach ($paginas as $pagina) { ?>
                        <li class="nav-item">
                            <a href="<?php echo $pagina['pag_direc']?>" class="nav-link active">
                                <i class="nav-icon bi bi-circle"></i>
                                <?php echo $pagina['pag_nombre']?>
                            </a>
                        </li>
                        <?php };?>
                    </ul>
                </li>
                    <?php } ?>
            </ul>
            <!--Fin::Menú lateral-->
        </nav>
    <!--Fin::Envolvimiento del menú lateral-->
    </div>
</aside>
<!-- Fin::Menu lateral -->