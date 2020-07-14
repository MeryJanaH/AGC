
<!-- Header -->

<div id="header" class="mdk-header js-mdk-header m-0" data-fixed data-effects="waterfall" data-retarget-mouse-scroll="false">
    <div class="mdk-header__content">

        <div class="navbar navbar-expand-sm navbar-main navbar-light bg-white  pr-0" id="navbar" data-primary>
            <div class="container-fluid p-0">

                <!-- Navbar toggler -->
                <button class="navbar-toggler navbar-toggler-custom d-lg-none d-flex mr-navbar" type="button" data-toggle="sidebar">
                    <span class="material-icons">short_text</span>
                </button>

                <!-- Navbar Brand -->
                  <?php if($_SESSION['current_page']=="projets"){?>
                    <a href="ui-projets.php" class="navbar-brand flex ">
                    <span>Table des projets</span>
                  <?php }if($_SESSION['current_page']=="index"){?>
                    <a href="index.php" class="navbar-brand flex ">
                    <span>Calendrier</span>
                  <?php }if($_SESSION['current_page']=="commerciaux"){ ?>
                    <a href="ui-tables.php" class="navbar-brand flex ">
                    <span>Table des commerciaux</span>
                  <?php }if($_SESSION['current_page']=="edit"){ ?>
                    <a href="edit-account.php" class="navbar-brand flex ">
                    <span>Modifier vos informations</span>
                  <?php }if($_SESSION['current_page']=="clients"){ ?>
                     <a href="table_clients.php" class="navbar-brand flex ">
                     <span>Table de clients</span>
                 <?php }if($_SESSION['current_page']=="Graphe"){ ?>
                    <a href="Graphe.php" class="navbar-brand flex ">
                    <span>Statistiques</span>
                  <?php } ?>
                </a>


        <!--        <ul class="nav navbar-nav d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a href="#notifications_menu" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">
                            <i class="material-icons nav-icon navbar-notifications-indicator">notifications</i>
                        </a>
                        <div id="notifications_menu" class="dropdown-menu dropdown-menu-right navbar-notifications-menu">
                            <div class="dropdown-item d-flex align-items-center py-2">
                                <span class="flex navbar-notifications-menu__title m-0">Notifications</span>
                                <a href="javascript:void(0)" class="text-muted"><small>Clear all</small></a>
                            </div>
                            <div class="navbar-notifications-menu__content" data-simplebar>
                                <div class="py-2">

                                    <div class="dropdown-item d-flex">
                                        <div class="mr-3">
                                            <div class="avatar avatar-sm" style="width: 32px; height: 32px;">
                                                <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <a href="">A.Demian</a> left a comment on <a href="">Stack</a><br>
                                            <small class="text-muted">1 minute ago</small>
                                        </div>
                                    </div>
                                    <div class="dropdown-item d-flex">
                                        <div class="mr-3">
                                            <a href="#">
                                                <div class="avatar avatar-xs" style="width: 32px; height: 32px;">
                                                    <span class="avatar-title bg-purple rounded-circle"><i class="material-icons icon-16pt">person_add</i></span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="flex">
                                            New user <a href="#">Peter Parker</a> signed up.<br>
                                            <small class="text-muted">1 hour ago</small>
                                        </div>
                                    </div>
                                    <div class="dropdown-item d-flex">
                                        <div class="mr-3">
                                            <a href="#">
                                                <div class="avatar avatar-xs" style="width: 32px; height: 32px;">
                                                    <span class="avatar-title rounded-circle">JD</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="flex">
                                            <a href="#">Big Joe</a> <small class="text-muted">wrote:</small><br>
                                            <div>Hey, how are you? What about our next meeting</div>
                                            <small class="text-muted">2 minutes ago</small>
                                        </div>
                                    </div>

                                    <div class="dropdown-item d-flex">
                                        <div class="mr-3">
                                            <div class="avatar avatar-sm" style="width: 32px; height: 32px;">
                                                <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <a href="">A.Demian</a> left a comment on <a href="">Stack</a><br>
                                            <small class="text-muted">1 minute ago</small>
                                        </div>
                                    </div>
                                    <div class="dropdown-item d-flex">
                                        <div class="mr-3">
                                            <a href="#">
                                                <div class="avatar avatar-xs" style="width: 32px; height: 32px;">
                                                    <span class="avatar-title bg-purple rounded-circle"><i class="material-icons icon-16pt">person_add</i></span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="flex">
                                            New user <a href="#">Peter Parker</a> signed up.<br>
                                            <small class="text-muted">1 hour ago</small>
                                        </div>
                                    </div>
                                    <div class="dropdown-item d-flex">
                                        <div class="mr-3">
                                            <a href="#">
                                                <div class="avatar avatar-xs" style="width: 32px; height: 32px;">
                                                    <span class="avatar-title rounded-circle">JD</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="flex">
                                            <a href="#">Big Joe</a> <small class="text-muted">wrote:</small><br>
                                            <div>Hey, how are you? What about our next meeting</div>
                                            <small class="text-muted">2 minutes ago</small>
                                        </div>
                                    </div>

                                    <div class="dropdown-item d-flex">
                                        <div class="mr-3">
                                            <div class="avatar avatar-sm" style="width: 32px; height: 32px;">
                                                <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                           </div>
                                        </div>
                                        <div class="flex">
                                            <a href="">A.Demian</a> left a comment on <a href="">Stack</a><br>
                                            <small class="text-muted">1 minute ago</small>
                                        </div>
                                    </div>
                                    <div class="dropdown-item d-flex">
                                        <div class="mr-3">
                                            <a href="#">
                                                <div class="avatar avatar-xs" style="width: 32px; height: 32px;">
                                                    <span class="avatar-title bg-purple rounded-circle"><i class="material-icons icon-16pt">person_add</i></span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="flex">
                                            New user <a href="#">Peter Parker</a> signed up.<br>
                                            <small class="text-muted">1 hour ago</small>
                                        </div>
                                    </div>
                                    <div class="dropdown-item d-flex">
                                        <div class="mr-3">
                                            <a href="#">
                                                <div class="avatar avatar-xs" style="width: 32px; height: 32px;">
                                                    <span class="avatar-title rounded-circle">JD</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="flex">
                                            <a href="#">Big Joe</a> <small class="text-muted">wrote:</small><br>
                                            <div>Hey, how are you? What about our next meeting</div>
                                            <small class="text-muted">2 minutes ago</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <a href="javascript:void(0);" class="dropdown-item text-center navbar-notifications-menu__footer">View All</a>
                        </div>
                    </li>
                </ul>-->
                <div>
                    <a  data-toggle="dropdown" data-caret="false" class="dropdown-toggle navbar-toggler navbar-toggler-company border-left d-flex align-items-center ml-navbar">
                        <span class="rounded-circle">
                            <span class="material-icons">business</span>
                        </span>
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- // END Header -->
