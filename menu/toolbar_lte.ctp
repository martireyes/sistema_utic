<?php require ("clases/conexion.php"); ?>
<aside class="main-sidebar">
    <section class="sidebar">
       <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php if(!empty($_SESSION['usu_foto'])){ echo $_SESSION['usu_foto'];}else{ echo "img/no_disponible.jpg";}?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $_SESSION['nombres'];?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Buscar...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <ul class="sidebar-menu">
            <li class="header">Men&uacute; principal</li>
            <li><a href="menu.php"><span class="glyphicon glyphicon-home"></span><strong>Inicio</strong></a></li>
            <?php
            $modulos=consultas::get_datos("select * from modulos order by mod_cod");
            foreach ($modulos as $modulo) { ?>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-list"></i>
                    <span><?php echo $modulo['mod_nombre']?><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <?php
                $paginas=consultas::get_datos("select * from paginas a join modulos b on a.mod_cod=b.mod_cod where mod_nombre='".$modulo['mod_nombre']."' order by pag_nombre");
                ?>
                <ul class="treeview-menu">
                <?php  foreach ($paginas as $pagina) { ?>
                <li><a href="<?php echo $pagina['pag_direc']?>"><i class="fa fa-circle-o"></i><?php echo $pagina['pag_nombre']?></a></li>
                <?php };?>
                </ul>
            </li>
                <?php } ?>
        </ul>
    </section>
</aside>