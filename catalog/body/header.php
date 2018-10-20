<body class="fixed-sn grey-skin">

<!--Double navigation-->
<header>
<!-- Sidebar navigation -->
<div id="slide-out" class="side-nav sn-bg-4 fixed">
<ul class="custom-scrollbar">
    <!-- Logo -->
    <li>
        <div class="logo-wrapper waves-light">
            <a href="<?php echo BASE_URL ?>"><img src="assets/img/logo/logo.png" class="img-fluid flex-center"></a>
        </div>
    </li>
    <!--/. Logo -->

    <!--Search Form-->
    <li>
        <form class="search-form" role="search">
            <div class="form-group md-form mt-0 pt-1 waves-light">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>
    </li>
    <!--/.Search Form-->
    <!-- Side navigation links -->
<?php include_once 'menu.php'; ?>
    <hr>
    <small> Powered By</small>  
    <a href="https://www.hibridosv.com" target="_blank"><img src="assets/img/logo/lgb.png" class="img-fluid flex-center"></a>
    <!--/. Side navigation links -->
</ul>
<div class="sidenav-bg mask-strong"></div>
</div>
<!--/. Sidebar navigation -->
<!-- Navbar -->
<nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
<!-- SideNav slide-out button -->
<div class="float-left">
    <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
</div>
<!-- Breadcrumb-->
<div class="breadcrumb-dn mr-auto">
    <p><?php echo $_SESSION["nombre"]; ?></p>
</div>

</nav>
<!-- /.Navbar -->
</header>

<main>