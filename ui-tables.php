<?php
require 'functions.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include 'head.php';?>

<body class="layout-default">
    <div class="preloader"></div>

    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px" data-fullbleed>
        <div class="mdk-drawer-layout__content">

            <!-- Header Layout -->
            <div class="mdk-header-layout js-mdk-header-layout" data-has-scrolling-region>

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
                                <a class="navbar-brand flex ">
                                    <span>Tables</span>
                                </a>
                                <ul class="nav navbar-nav d-none d-md-flex">
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
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- // END Header -->

                <!-- Header Layout Content -->
                <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page">
                    <div class="container-fluid page__container">
                        <div class="card card-form">
                            <div class="row no-gutters">
                                <div class="col-lg-4 card-body">
                                    <p><strong class="headings-color">Search</strong></p>
                                    <p class="text-muted">Table de gestion des Commerciaux de <strong> GUESSPROMO </strong>:</p>
                                </div>
                                <div class="col-lg-8 card-form__body">

                                    <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>

                                        <div class="search-form search-form--light m-3">
                                            <input type="text" class="form-control search" placeholder="Search">
                                            <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                        </div>
                                    <table class="table mb-0 thead-border-top-0">
                                        <thead>
                                            <tr>
                                                <th>Employés</th>
                                                <th style="width: 120px;">Premier Connexion</th>
                                                <th style="width: 120px;">Dernier connexion</th>
                                                <th style="width: 120px;">"id"</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list" id="staff02">
                                          <!--table des Employés-->
                                          <?php update_table_emp(); ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- // END header-layout__content -->

            </div>
            <!-- // END header-layout -->

        </div>
        <!-- // END drawer-layout__content -->

<?php include 'footer.php';?>

</html>