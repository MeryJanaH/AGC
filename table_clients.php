<?php
require 'functions.php';
$_SESSION['current_page']="clients";
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
                          if(isset($_POST["name_client"]))
                          {
                              if (isset($_POST["add"]))
                              {
                                  add_client($_POST["name_client"],$_POST["num"],$_POST["Note"],$_POST["source"],$_POST["c_p"]);
                              }
                          }
                          else {
                           header('Location: table_clients.php');
                          }
                 ?>

                    <!-- Header Layout Content -->
                    <form action="#Ajouter" method="POST">
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
                                                    <th style="width: 120px;" name="name_client">Nom</th>
                                                    <th style="width: 120px;" name="num">Numéro de téléphone</th>
                                                    <th style="width: 120px;" name="projet">Projet</th>
                                                    <th style="width: 120px;" name="Note">Notes</th>
                                                    <th style="width: 120px;" name="source">Source</th>
                                                    <th style="width: 120px;" name="source">Date du 1er visite</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list" id="staff03">
                                              <!--table des Employés-->
                                              <?php update_table_clients(); ?>
                                            </tbody>
                                        </table>
                                        <td>
                                          <br/>
                                          <br/>
                                           <input type="button" id="btnShowMsg1"  style="width: 200px; color: green;" value="Ajouter un nouveau client !" onClick="add_ct()"/>
                                           <input type="button" id="btnShowMsg2"  style="width: 300px; color: red;" value="Modifier les informations des clients !" onClick="window.location.href='in.php?data=clients';"/>
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


    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/vendor/bootstrap.min.js"></script>

    <!-- Simplebar -->
    <script src="assets/vendor/simplebar.min.js"></script>

    <!-- DOM Factory -->
    <script src="assets/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="assets/vendor/material-design-kit.js"></script>


    <!-- App -->
    <script src="assets/js/app.js"></script>

    <!-- App Settings (safe to remove) -->
    <script src="assets/js/app-settings.js"></script>

    <!-- List.js -->
    <script src="assets/vendor/list.min.js"></script>
    <script src="assets/js/list.js"></script>

    </body>

    </html>
