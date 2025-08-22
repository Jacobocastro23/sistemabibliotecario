<?php
    if($_SESSION['UserPrivilege']=='Student'){
        $imgUser='user03';
    }else if($_SESSION['UserPrivilege']=='Teacher'){
        $imgUser='user02';
    }else if($_SESSION['UserPrivilege']=='Admin'){
        $imgUser='user01';
    }else if($_SESSION['UserPrivilege']=='Personal'){
        $imgUser='user05';
    }else{
        $imgUser='user';
    }
?>

<style>
    .navbar-user-top {
        background-color: #1B5E20;
        color: #FFFFFF;
        padding: 10px 15px;
        border-bottom: 2px solid #A5D6A7;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    .navbar-left,
    .navbar-right {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .navbar-left {
        flex: 1;
    }

    .navbar-right {
        flex: 1;
        justify-content: flex-end;
    }

    .navbar-user-top figure {
        margin: 0;
    }

    .navbar-user-top figure img {
        width: 45px;
        height: 45px;
        border: 2px solid #A5D6A7;
        border-radius: 50%;
    }

    .navbar-user-top li {
        list-style: none;
        color: #FFFFFF;
        font-weight: 500;
        display: flex;
        align-items: center;
    }

    .navbar-user-top li i {
        font-size: 20px;
        color: #FFFFFF;
        transition: color 0.3s ease;
        cursor: pointer;
    }

    .navbar-user-top li:hover i {
        color: #A5D6A7;
    }

    .navbar-user-top .all-tittles {
        font-size: 16px;
        font-weight: bold;
        margin-left: 5px;
    }

    .navbar-user-top .tooltips-general {
        padding: 5px;
    }

    .navbar-user-top .mobile-menu-button,
    .navbar-user-top .desktop-menu-button {
        width: 40px;
        text-align: center;
    }

    .navbar-user-top .mobile-menu-button i,
    .navbar-user-top .desktop-menu-button i {
        font-size: 22px;
        color: #FFFFFF;
    }

    .navbar-user-top .mobile-menu-button:hover i,
    .navbar-user-top .desktop-menu-button:hover i {
        color: #A5D6A7;
    }
</style>

<nav class="navbar-user-top full-reset">
    <div class="navbar-left">
        <li class="desktop-menu-button hidden-xs">
            <i class="zmdi zmdi-swap"></i>
        </li>
        <li class="mobile-menu-button visible-xs">
            <i class="zmdi zmdi-more-vert"></i>
        </li>
    </div>

    <div class="navbar-right">
        <li>
            <figure>
                <img src="<?php echo $LinksRoute.'assets/img/'.$imgUser.'.png'; ?>" alt="user-picture" class="img-responsive img-circle center-box">
            </figure>
        </li>
        <li style="cursor:default;">
            <span class="all-tittles"><?php echo $_SESSION['UserName']; ?></span>
        </li>
        <li class="tooltips-general search-book-button" data-href="<?php echo $LinksRoute; ?>searchbook.php" data-placement="bottom" title="Buscar libro">
            <i class="zmdi zmdi-search"></i>
        </li>
        <li class="tooltips-general btn-help" data-placement="bottom" title="Ayuda">
            <i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>
        </li>
        <li class="tooltips-general exit-system-button" data-href="<?php echo $LinksRoute; ?>process/logout.php" data-placement="bottom" title="Salir del sistema">
            <i class="zmdi zmdi-power"></i>
        </li>
    </div>
</nav>