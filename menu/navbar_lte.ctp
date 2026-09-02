<nav class="ms-auto d-flex align-items-center">
    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"><i class="bi bi-list"></i></a>
        <!-- <span class="sr-only">Toggle navigation</span> -->
    </a>
    <ul class="navbar-nav">
        <li class="nav-item dropdown user-menu">
            
        <a href="#" class="dropdown-toggle" class="user-image rounded-circle" alt="User Image" width="30"height="30">
            <img src="<?php if(!empty($_SESSION['usu_foto'])){ echo $_SESSION['usu_foto'];}else{ echo "img/no_disponible.jpg";}?>" class="user-image" alt="User Image">
                    <span class="d-none d-sm-inline"><?php echo $_SESSION['usu_nick'];?></span>
                </a>
                <ul class="dropdown">
                    <li class="user-header">
                        <img src="<?php if(!empty($_SESSION['usu_foto'])){ echo $_SESSION['usu_foto'];}else{ echo "img/no_disponible.jpg";}?>" class="img-circle" alt="User Image">
                        <p>
                            <?php echo $_SESSION['nombres'];?>
                            <small>Cargo: <?php if(!empty($_SESSION['cargo'])){ echo $_SESSION['cargo'];}else{ echo "No especificado";}?></small>
                        </p>
                    </li>
                    <li class="user-footer">
                        <div class="float-start">
                            <a href="perfil.php" class="btn btn-default">Perfil</a>
                        </div>
                        <div class="float-end">
                            <a href="index.php" class="btn btn-default">Salir</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
</nav>