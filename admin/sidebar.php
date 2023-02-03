<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
                <?php
                if($modulo == "dashboard") {
                    $url = "../web/";
                }else{
                    $url = "../";
                }
                ?>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo $url; ?>" style="background-color:rgba(38,45,136,255)";>
                <div class="sidebar-brand-icon">
                <img src="../img/unerg.jpg" width="80px">
                </div>
                <div class="sidebar-brand-text mx-3">UNERG  AIS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if($modulo == "dashboard") { echo "active"; } ?>">
                <a class="nav-link" href="<?php if($modulo == "dashboard") {  }else{ echo "../"; } ?>">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

             <!-- Nav Item - Agendas -->
             <li class="nav-item <?php if($modulo == "asistentes" || $modulo== "sesiones") { echo "active"; } ?>">
                <a class="nav-link" href="<?php if($modulo == "dashboard") { echo "sesiones"; }else{ echo "../sesiones"; } ?>">
                    <i class="fas fa-users"></i>
                    <span>Sesiones</span></a>
            </li>

    

            <!-- Nav Item - Resoluciones -->
            <li class="nav-item <?php if($modulo == "resoluciones") { echo "active"; } ?>">
                <a class="nav-link" href="<?php if($modulo == "dashboard") { echo "resoluciones"; }else{ echo "../resoluciones"; } ?>">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Resoluciones</span></a>
            </li>

            <!-- Nav Item - Resoluciones -->
            <li class="nav-item <?php if($modulo == "gacetas") { echo "active"; } ?>">
                <a class="nav-link" href="<?php if($modulo == "dashboard") { echo "gacetas"; }else{ echo "../gacetas"; } ?>">
                    <i class="fas fa-file-alt"></i>
                    <span>Gacetas</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">


            <?php if($_SESSION['role'] > 0) {  ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Administrador
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link <?php if($modulo != "usuarios"){ echo "collapsed"; } ?>" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Configuracion</span>
                </a>
                <div id="collapseTwo" class="collapse <?php if($modulo == "usuarios" || $modulo == "firmantes" || $modulo == "sellos" || $modulo == "redactar" || $modulo == "miembros"){ echo "show"; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Configuraciones:</h6>
                        <a class="collapse-item <?php if($modulo == "usuarios") { echo "active"; } ?>" href="<?php if($modulo == "dashboard") { echo "usuarios"; }else{ echo "../usuarios"; } ?>">
                            <i class="fas fa-user-friends"></i>
                            Usuarios
                        </a>
                        <a class="collapse-item <?php if($modulo == "miembros") { echo "active"; } ?>" href="<?php if($modulo == "dashboard") { echo "miembros"; }else{ echo "../miembros"; } ?>">
                            <i class="fas fa-users"></i>
                            Miembros del Consejo
                        </a>

                        <a class="collapse-item <?php if($modulo == "firmantes") { echo "active"; } ?>" href="<?php if($modulo == "dashboard") { echo "firmantes"; }else{ echo "../firmantes"; } ?>">
                            <i class="fas fa-pen-fancy"></i>
                            Firmantes
                        </a>
                        <a class="collapse-item <?php if($modulo == "sellos") { echo "active"; } ?>" href="<?php if($modulo == "dashboard") { echo "sellos"; }else{ echo "../sellos"; } ?>">
                            <i class="fas fa-stamp"></i>
                            Sello
                        </a>
                    </div>
                </div>
            </li>

        
            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php } ?>

           

           

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        
        </ul>