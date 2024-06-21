<body style="overflow-x : hidden;">

    <!-- navbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- logo -->
        <img src="<?= BURL ?>/img/logo.png" alt="" width="50px">

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link" href="#" id="messagesDropdown">
                    test
                </a>
            </li>

            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link" href="#" id="messagesDropdown">
                    test
                </a>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button class="btn btn-primary">Login</button>
                </a>

            </li>

        </ul>
    </nav>
    <!-- End of Top Navbar -->

    <!-- main -->
    <section class="min-vh-100" style="margin : -24px;">
        <div class="position-relative h-100 ">
            <img class="position-absolute top-0 z-0 w-100" src="<?= BURL ?>/img/bordertop.png" alt="" height="400px">

            <div class=" z-1 d-flex justify-content-between flex-row w-100 " style="padding-top: 6rem;">
                <div style="margin-top : 6rem; margin-left : 10rem; font-size: 42px;" class="main-text">
                    <p class="text-primary "><strong>"You don't understand anything until you learn it more than one
                            way"</strong></p>
                    <p class="text-primary">-Marvin Minsky</p>
                </div>
                <img style="width : 791px; height : 487px; margin-right : 50px" src="<?= BURL ?>/img/maingraphic.png" alt="">
            </div>
        </div>
    </section>

    <section class="min-vh-100" style="margin-top: 10rem;">
        <div class="position-relative h-100">

            <div class=" z-1 d-flex justify-content-center align-items-end flex-row w-100 h-100" style="">
                <div style="" class="main-text text-center">
                    <p class="text-dark" style="font-size: 54px;">To reach the Top all you need to do is take a step</p>
                    <p class="text-primary" style="font-size: 38px;">“There is no an instant way to the top, but there is a way... and more ways. So, take your step and move to the Top.”</p>
                    <img class="" style="width : 741px; height : 437px;" src="<?= BURL ?>/img/botgraphic.png" alt="">
                </div>
            </div>
        </div>
        <img style="position: absolute; bottom: 0; z-index: 0;" src="<?= BURL ?>/img/borderbot.png" alt="" width="100%" height="400px">
    </section>
    <!-- end of main -->

    <!-- Footer -->
    <footer class="position-relative bg-white d-flex justify-content-end">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
</body>