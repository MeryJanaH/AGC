<?php
require 'functions.php';
$_SESSION['current_page']="projets";
if(isset($_SESSION['login']) and $_SESSION['login']=="false" or !isset($_SESSION['login']))
{
      header('Location: login.php');
}

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

          <?php include 'haute_bar.php';
                          if(isset($_POST["proj_name"]))
                          {
                            if($_POST["proj_name"][0]!="" and $_POST["proj_type"][0]!="" and $_POST["proj_etage"][0]!="" and $_POST["Surface"][0]!="" and $_POST["proj_prix"][0]!="")
                            {
                              if (isset($_POST["add"]))
                              {
                                  add_projet($_POST["proj_name"],$_POST["proj_type"],$_POST["proj_etage"],$_POST["proj_surface"],$_POST["proj_prix"]);
                              }
                            }
                            else
                            {
                              ?>
                            <script>
                              alert("Vous avez pas renseigner tous les champs concernant le projet");
                            </script>
                            <?php
                           }
                          }
                          else {
                            header('Location: ui-projets.php');
                          }
                 ?>

                    <!-- Header Layout Content -->
                    <form action="#add_projet" method="POST">
                    <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page">
                        <div class="container-fluid page__container">
                            <div class="card card-form">
                                <div class="row no-gutters">

                                    <div class="col-lg-12 card-form__body">

                                        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>

                                            <div class="search-form search-form--light m-3">
                                                <input type="text" class="form-control search" placeholder="Search">
                                                <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                            </div>
                                        <table class="table mb-0 thead-border-top-0">
                                            <thead>
                                                <tr>
                                                    <th style="width: 120px;" name="name_pj">Projets</th>
                                                    <th style="width: 120px;" name="type">Type</th>
                                                    <th style="width: 120px;" name="Etage">Etage</th>
                                                    <th style="width: 120px;" name="Surface">Surface</th>
                                                    <th style="width: 120px;" name="prix">Prix</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list" id="staff02">
                                              <!--table des Employés-->
                                              <?php update_table_projets(); ?>
                                            </tbody>
                                        </table>
                                        <td>
                                          <br/>
                                          <br/>
                                           <input type="button" id="btnShowMsg1"  style="width: 200px; color: green;" value="Ajouter un nouveau projet !" onClick="add_pj()"/>
                                           <input type="button" id="btnShowMsg2"  style="width: 200px; color: red;" value="Modifier un projets !" onClick="window.location.href='in.php';"/>
                                           <br/>
                                           <br/>
                                        <div class="form-group">
                                            <button class="btn btn-block btn-primary" name="add" type="submit">Enregistrer</button>
                                        </div>
                                       </td>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                    <!-- // END header-layout__content -->

                </div>
                <!-- // END header-layout -->

            </div>
            <!-- // END drawer-layout__content -->

    <?php include 'footer.php';?>


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



        <!-- List.js -->
        <script src="assets/vendor/list.min.js"></script>
        <script src="assets/js/list.js"></script>

    </body>

    </html>
