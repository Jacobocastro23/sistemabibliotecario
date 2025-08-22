<?php
    if($LinksRoute=="../"){ $LinkRouteAdmin=""; }else{ $LinkRouteAdmin="./admin/"; }
?>
<style>
/* ============= Estilos Menú Lateral ============= */
.navbar-lateral{
    background-color: #006400; /* Verde bandera */
    color: #fff;
}
.nav-lateral-list-menu ul li a, .dropdown-menu-button{
    color: #fff;
    padding: 10px 20px;
    display: block;
    text-decoration: none;
    transition: all 0.3s ease;
    border-radius: 5px;
}
.nav-lateral-list-menu ul li a:hover, .dropdown-menu-button:hover{
    background-color: #004d00; /* Verde más oscuro */
    color: #fff;
}
.dropdown-menu-button{
    cursor: pointer;
    position: relative;
}
.dropdown-menu-button i.pull-right{
    position: absolute;
    right: 15px;
}
.nav-lateral-list-menu ul ul{
    display: none;
    padding-left: 15px;
    background-color: #005500; /* Submenú verde más oscuro */
    border-radius: 5px;
}
.label-mhover{
    background-color: #ff0000;
    color: #fff;
    padding: 2px 6px;
    border-radius: 12px;
    font-size: 12px;
    margin-left: 5px;
}
.logo, .full-reset.container-menu-movile p{
    color: #fff;
}
.nav-lateral-divider{
    border-top: 1px solid #00ff00; /* línea verde clara */
    margin: 10px 0;
}
</style>

<div class="navbar-lateral full-cover-background full-reset">
    <div class="visible-xs font-movile-menu mobile-menu-button"></div>
    <div class="full-reset container-menu-movile scroll">
        <div class="logo full-reset all-tittles">
            <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i> 
            Sistema Bibliotecario
        </div>
        <div class="full-reset nav-lateral-divider"></div>
        <div class="full-reset" style="padding: 20px 0; text-align: center; background-color: #004d00; border-radius: 0 0 15px 15px;">
    <figure style="margin: 0 auto; width: 80%;">
        <img src="<?php echo $LinksRoute; ?>assets/img/linces.png" alt="Biblioteca" class="img-responsive center-box" style="width: 70%; border-radius: 10px; border: 2px solid #00ff00; padding: 5px; background-color: #fff;">
    </figure>
    <p class="text-center" style="padding-top: 15px; color: #fff; font-weight: bold; font-size: 16px;">Sistema Bibliotecario</p>
</div>

        <div class="full-reset nav-lateral-divider"></div>
        <div class="full-reset nav-lateral-list-menu">
            <ul class="list-unstyled">
                <?php
                if($_SESSION['UserPrivilege']=='Student'||$_SESSION['UserPrivilege']=='Teacher'||$_SESSION['UserPrivilege']=='Personal'):
                ?>
                <li><a href="catalog.php"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Catálogo</a></li>
                <li><a href="loansUsers.php"><i class="zmdi zmdi-time-restore zmdi-hc-fw"></i>&nbsp;&nbsp; Pendientes</a></li>
                <li><a href="reservations.php"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>&nbsp;&nbsp; Reservaciones</a></li>
                <li><a href="configAccount.php"><i class="zmdi zmdi-account-box-o zmdi-hc-fw"></i>&nbsp;&nbsp; Configurar cuenta</a></li>
                <?php
                elseif($_SESSION['UserPrivilege']=='Admin'):
                ?>
                <li>
                    <a href="<?php echo $LinksRoute; ?>home.php"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a>
                </li>
                <li>
                    <div class="dropdown-menu-button">
                        <i class="zmdi zmdi-case zmdi-hc-fw"></i>&nbsp;&nbsp; Administración <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i>
                    </div>
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?php echo $LinkRouteAdmin; ?>admininstitution.php">
                                <i class="zmdi zmdi-balance zmdi-hc-fw"></i>&nbsp;&nbsp; Datos institución
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $LinkRouteAdmin; ?>adminprovider.php">
                                <i class="zmdi zmdi-truck zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo proveedor
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $LinkRouteAdmin; ?>admincategory.php">
                                <i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Nueva categoría
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $LinkRouteAdmin; ?>adminsection.php">
                                <i class="zmdi zmdi-assignment-account zmdi-hc-fw"></i>&nbsp;&nbsp; Nueva grupos
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="dropdown-menu-button">
                        <i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Registro de usuarios <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i>
                    </div>
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?php echo $LinkRouteAdmin; ?>adminuser.php">
                                <i class="zmdi zmdi-face zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo administrador
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $LinkRouteAdmin; ?>adminteacher.php">
                                <i class="zmdi zmdi-male-alt zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo docente
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $LinkRouteAdmin; ?>adminstudent.php">
                                <i class="zmdi zmdi-accounts zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo estudiante
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $LinkRouteAdmin; ?>adminpersonal.php">
                                <i class="zmdi zmdi-male-female zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo personal administrativo
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="dropdown-menu-button">
                        <i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp; Libros y catálogo <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i>
                    </div>
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?php echo $LinkRouteAdmin; ?>admininventory.php" >
                                <i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo libro
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $LinksRoute; ?>catalog.php">
                                <i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Catálogo
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo $LinksRoute; ?>multipleloans2.php">
                        <i class="zmdi zmdi-library zmdi-hc-fw"></i>&nbsp;&nbsp; Préstamos múltiples
                        <?php
                            if(isset($_SESSION['prestmultiple']) && count($_SESSION['prestmultiple'])>=1){
                                $npm=count($_SESSION['prestmultiple']);
                                echo '<span class="label label-danger pull-right label-mhover">'.$npm.'</span>';
                            }
                        ?>
                    </a>
                </li>
                <li>
                    <div class="dropdown-menu-button">
                        <i class="zmdi zmdi-alarm zmdi-hc-fw"></i>&nbsp;&nbsp; Préstamos y reservaciones <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i>
                    </div>
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?php echo $LinkRouteAdmin; ?>adminloan.php">
                                <i class="zmdi zmdi-calendar zmdi-hc-fw"></i>&nbsp;&nbsp; Todos los préstamos
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $LinkRouteAdmin; ?>adminloanpending.php">
                                <i class="zmdi zmdi-time-restore zmdi-hc-fw"></i>&nbsp;&nbsp; Devoluciones pendientes
                                <?php
                                    $checkLoanPending1=ejecutarSQL::consultar("SELECT CodigoPrestamo FROM prestamo WHERE Estado='Prestamo'");
                                    if(mysqli_num_rows($checkLoanPending1)>0){ 
                                        echo '<span class="label label-danger pull-right label-mhover">'.mysqli_num_rows($checkLoanPending1).'</span>'; 
                                    }
                                    mysqli_free_result($checkLoanPending1);
                                ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $LinkRouteAdmin; ?>adminreservation.php">
                                <i class="zmdi zmdi-timer zmdi-hc-fw"></i>&nbsp;&nbsp; Reservaciones
                                <?php 
                                    $checkReservation1=ejecutarSQL::consultar("SELECT CodigoPrestamo FROM prestamo WHERE Estado='Reservacion'");
                                    if(mysqli_num_rows($checkReservation1)>0){ 
                                        echo '<span class="label label-danger pull-right label-mhover">'.mysqli_num_rows($checkReservation1).'</span>'; 
                                    }
                                    mysqli_free_result($checkReservation1);
                                ?>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo $LinkRouteAdmin; ?>adminreport.php">
                        <i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp; Reportes y estadísticas
                    </a>
                </li>
                <li>
                    <a href="<?php echo $LinkRouteAdmin; ?>adminadvancesettings.php">
                        <i class="zmdi zmdi-wrench zmdi-hc-fw"></i>&nbsp;&nbsp; Configuraciones avanzadas
                    </a>
                </li>
                <?php
                endif;
                ?>
            </ul>
        </div>
    </div>
</div>


