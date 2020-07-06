
<!-- // barre bleu -->
<div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-dark sidebar-left simplebar" data-simplebar>
            <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account flex-shrink-0">
                <a href="index.php" class="flex d-flex align-items-center text-underline-0 text-body">
                    <span class="mr-3">
                        <img src="assets/images/logo.svg" width="43" height="43" alt="avatar">
                    </span>
                    <span class="flex d-flex flex-column">
                        <strong style="font-size: 1.125rem;">bienvenu</strong>
                    </span>
                </a>
                <div class="dropdown ml-auto">
                    <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">keyboard_arrow_down</i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-item-text dropdown-item-text--lh">
                            <div><strong><?php echo $_SESSION['name'] ?></strong></div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item active" href="index.php">tableau de bord</a>
                        <a class="dropdown-item" href="edit-account.php">Edit account</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="Déconnexion.php">Déconnexion</a>
                    </div>
                </div>
            </div>


            <ul class="nav nav-tabs sidebar-tabs flex-shrink-0" role="tablist">
                <li class="nav-item"><a class="nav-link active show" id="sm-menu-tab" href="#sm-menu" data-toggle="tab" role="tab" aria-controls="sm-menu" aria-selected="true">Menu</a></li>
            </ul>
            <div class="tab-content">
                <div id="sm-menu" class="tab-pane show active" role="tabpanel" aria-labelledby="sm-menu-tab">
                    <ul class="sidebar-menu flex">
                        <li class="sidebar-menu-item active">
                            <a class="sidebar-menu-button" href="index.php">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                                <span class="sidebar-menu-text">tableau de bord</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" data-toggle="collapse" href="#pages_menu">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">description</i>
                                <span class="sidebar-menu-text">Pages</span>
                                <span class="sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu collapse" id="pages_menu">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="edit-account.php">
                                        <span class="sidebar-menu-text">Edit Account</span>
                                    </a>
                                </li>
                                <?php
                                if($_SESSION['user']=="admin")
                                {
                                ?>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="signup.php">
                                        <span class="sidebar-menu-text">Créer un compte</span>
                                    </a>
                                </li>
                                <?php
                                 }
                                 ?>
                            </ul>
                        </li>

                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" data-toggle="collapse" href="#components_menu">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">developer_board</i>
                                <span class="sidebar-menu-text">UI Elements</span>
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu collapse" id="components_menu">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="ui-tables.php">
                                        <span class="sidebar-menu-text">Tables</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="ui-buttons.html">
                                        <span class="sidebar-menu-text">button</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="ui-alerts.html">
                                        <span class="sidebar-menu-text">alert</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="ui-charts.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">donut_small</i>
                                <span class="sidebar-menu-text">Charts</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fullcalendar.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">date_range</i>
                                <span class="sidebar-menu-text">Calendar</span>
                            </a>
                        </li>
                    </ul>
                </div>

            <div class="mt-auto sidebar-p-a sidebar-b-t d-flex flex-column flex-shrink-0">
                <a class="sidebar-link mb-2" href="edit-account.php">Change Password</a>
                <a class="sidebar-link mb-2" href="edit-account.php">Settings</a>
                <a class="sidebar-link" href="login.html">
                  <p>
                    <a class="sidebar-link" href="Déconnexion.php">Déconnexion</a>
                    <i class="sidebar-menu-icon ml-2 material-icons icon-16pt">exit_to_app</i>
                  </p>
                </a>
            </div>

        </div>
    </div>
</div>
</div>
<!-- // END drawer-layout -->






<!-- App Settings FAB -->
<div id="app-settings">
<app-settings></app-settings>
</div>

<!-- jQuery -->
<script src="assets/vendor/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="assets/vendor/popper.min.js"></script>
<script src="assets/vendor/bootstrap.min.js"></script>

<!-- Simplebar -->
<script src="assets/vendor/simplebar.min.js"></script>

<!-- DOM Factory -->
<script src="assets/vendor/dom-factory.js"></script>

<!-- MDK -->
<script src="assets/vendor/material-design-kit.js"></script>

<!-- Range Slider -->
<script src="assets/vendor/ion.rangeSlider.min.js"></script>
<script src="assets/js/ion-rangeslider.js"></script>

<!-- App -->
<script src="assets/js/toggle-check-all.js"></script>
<script src="assets/js/check-selected-row.js"></script>
<script src="assets/js/dropdown.js"></script>
<script src="assets/js/sidebar-mini.js"></script>
<script src="assets/js/app.js"></script>

<!-- App Settings (safe to remove) -->
<script src="assets/js/app-settings.js"></script>



<!-- Flatpickr -->
<script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
<script src="assets/js/flatpickr.js"></script>

<!-- Global Settings -->
<script src="assets/js/settings.js"></script>

<!-- Chart.js -->
<script src="assets/vendor/Chart.min.js"></script>

<!-- App Charts JS -->
<script src="assets/js/chartjs-rounded-bar.js"></script>
<script src="assets/js/charts.js"></script>

<!-- Vector Maps -->
<script src="assets/vendor/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="assets/js/vector-maps.js"></script>

<!-- Chart Samples -->
<script src="assets/js/page.dashboard.js"></script>

</body>