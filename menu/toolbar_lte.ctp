<?php require ("clases/conexion.php"); ?>
<aside class="app-sidebar bg-body-secondary shadow">
    <div class="sidebar-wrapper">
        <div class="sidebar-user p-3">
            <div class="pull-left image">
                <img src="<?php if(!empty($_SESSION['usu_foto'])){ echo $_SESSION['usu_foto'];}else{ echo "img/no_disponible.jpg";}?>" class="img-circle" alt="User Image">
            </div>
            <div class="d-flex align-items-center">
                <p><?php echo $_SESSION['nombres'];?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form action="#" method="get" class="p-2">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Buscar...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <ul class="nav sidebar-menu flex-column">
            <li class="header">Men&uacute; principal</li>
            <li class="nav-item"><a href="menu.php" class="nav-link"><i class="nav-icon fas fa-home"></i><p>Inicio</p></a></li>
            <?php
            $modulos=consultas::get_datos("select * from modulos order by mod_cod");
            foreach ($modulos as $modulo) { ?>
            <li class="nav-item">
                <a href="">
                    <i class="nav-icon fas fa-list"></i>
                    <span><?php echo $modulo['mod_nombre']?></span><i class="fa fa-angle-left pull-right"></i>
                </a>
        <?php
        $paginas=consultas::get_datos("select * from paginas a join modulos b on a.mod_cod=b.mod_cod where mod_nombre='".$modulo['mod_nombre']."' order by pag_nombre");
        ?>
        <ul class="nav nav-treeview">
            <?php  foreach ($paginas as $pagina) { ?>
            <li><a href="<?php echo $pagina['pag_direc']?>"><i class="fa fa-circle-o"></i> <?php echo $pagina['pag_nombre']?></a></li>
            <?php };?>
        </ul>
    </li>
    <?php } ?>
        </ul>
</div>
</aside>