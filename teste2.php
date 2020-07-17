<?php
require 'functions.php';
$_SESSION['current_page']="projets";

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Projets</title>


        <!-- Simplebar -->
        <link type="text/css" href="assets/vendor/simplebar.min.css" rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css" href="assets/css/app.css" rel="stylesheet">
        <link type="text/css" href="assets/css/app.rtl.css" rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css" href="assets/css/vendor-material-icons.css" rel="stylesheet">
        <link type="text/css" href="assets/css/vendor-material-icons.rtl.css" rel="stylesheet">

        <!-- Font Awesome FREE Icons -->
        <link type="text/css" href="assets/css/vendor-fontawesome-free.css" rel="stylesheet">
        <link type="text/css" href="assets/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">

        <!-- ion Range Slider -->
        <link type="text/css" href="assets/css/vendor-ion-rangeslider.css" rel="stylesheet">
        <link type="text/css" href="assets/css/vendor-ion-rangeslider.rtl.css" rel="stylesheet">

    </head>

    <body class="layout-default">
        <div class="preloader"></div>

        <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px" data-fullbleed>
            <div class="mdk-drawer-layout__content">

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout" data-has-scrolling-region>

              <?php include 'haute_bar.php';?>

                <!-- Header Layout Content -->

                <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page">
                  <div class="container-fluid page__container">
                      <div class="row">
                          <div class="col-lg">
                              <div class="card">
                                  <div class="card-header card-header-large bg-white d-flex align-items-center">
                                      <h4 class="card-header__title flex m-0">Recent Activity</h4>
                                      <div>
                                          <a href="javascript:void(0)" class="link-date">13/03/2018 <span class="text-muted mx-1">to</span> 20/03/2018</a>
                                      </div>
                                  </div>
                                  <div class="card-header card-header-tabs-basic nav" role="tablist">
                                      <a href="#Janvier" class="active" data-toggle="tab" role="tab" aria-controls="activity_all" aria-selected="true">Janvier</a>
                                      <a href="#Fevrier" data-toggle="tab" role="tab"  aria-selected="false">Fevrier</a>
                                      <a href="#activity_emails" data-toggle="tab" role="tab" aria-selected="false">Emails</a>
                                      <a href="#activity_quotes" data-toggle="tab" role="tab" aria-selected="false">Quotes</a>
                                  </div>
                                  <div class="card-body tab-content">
                                      <div class="tab-pane active show fade" id="Janvier">

                                            <div class="card card-form">
                                                <div class="row no-gutters">
                                                    <div class="col-lg-12 card-form__body border-left">
                                                        <div id="contacts">
                                                            <table class="table mb-0 thead-border-top-0">
                                                                  <thead>
                                                                      <tr>
                                                                        <th class="sort" data-sort="Projets">Projets</th>
                                                                        <th class="sort" data-sort="Facebook">Facebook/Instagram</th>
                                                                        <th class="sort" data-sort="Avito">Avito/Mubawab</th>
                                                                        <th class="sort" data-sort="Ancien">Ancien client</th>
                                                                        <th class="sort" data-sort="Prospection">Prospection</th>
                                                                        <th class="sort" data-sort="Connaissance">Connaissance</th>
                                                                        <th class="sort" data-sort="Annonce">Annonce</th>
                                                                        <th class="sort" data-sort="Passage">De passage</th>
                                                                       <tr> <th class="Total">Total</th> </tr>
                                                                      </tr>
                                                                    </thead>
                                                                    <tbody class="list">
                                                                      <?php
                                                                      clients_par_source();
                                                                      ?>
                                                                    </tbody>
                                                              </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                      <div class="tab-pane  fade" id="Fevrier">
                                        <div class="card card-form">
                                            <div class="row no-gutters">
                                                <div class="col-lg-12 card-form__body border-left">
                                                    <div id="contacts">
                                                        <table class="table mb-0 thead-border-top-0">
                                                              <thead>
                                                                  <tr>
                                                                    <th class="sort" data-sort="Projets">Projets</th>
                                                                    <th class="sort" data-sort="Facebook">Facebook/Instagram</th>
                                                                    <th class="sort" data-sort="Avito">Avito/Mubawab</th>
                                                                    <th class="sort" data-sort="Ancien">Ancien client</th>
                                                                    <th class="sort" data-sort="Prospection">Prospection</th>
                                                                    <th class="sort" data-sort="Connaissance">Connaissance</th>
                                                                    <th class="sort" data-sort="Annonce">Annonce</th>
                                                                    <th class="sort" data-sort="Passage">De passage</th>
                                                                   <tr> <th class="Total">Total</th> </tr>
                                                                  </tr>
                                                                </thead>
                                                                <tbody class="list">
                                                                  <?php
                                                                  clients_par_source();
                                                                  ?>
                                                                </tbody>
                                                          </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>

                                          <br/>
                                          <br/>
                                          <br/>

                        <div class="container-fluid page__container">
                            <div class="card card-form">
                                <div class="row no-gutters">
                                    <div class="col-lg-12 card-form__body border-left">
                                        <div id="contacts2">
                                          <table class="table mb-0 thead-border-top-0">
                                                <thead>
                                                    <tr>
                                                      <th class="sort" data-sort="Pj">Projets</th>
                                                      <th class="sort" data-sort="bureau">Clients au bureau</th>
                                                      <th class="sort" data-sort="c_projet">Clients par projet</th>
                                                      <th class="sort" data-sort="vente">Ventes</th>
                                                     <tr> <th class="Total">Total</th> </tr>
                                                    </tr>
                                                  </thead>
                                                  <tbody class="list">

                                                    <?php
                                                    Total_client_projets();
                                                    ?>
                                                  </tbody>
                                            </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>

          var options = {
          valueNames: [ 'id', 'Projets', 'Facebook', 'Avito', 'Ancien', 'Prospection', 'Connaissance', 'Annonce', 'Passage']
        };

        // Init list
        var contactList = new List('contacts', options);

        function refreshCallbacks() {
          // Needed to add new buttons to jQuery-extended object
          removeBtns.click(function() {
            var itemId = $(this).closest('tr').find('.id').text();
          });
        }


        var options2 = {
        valueNames: [ 'id', 'Pj', 'vente', 'bureau', 'c_projet']
      };

      // Init list
      var contactList = new List('contacts', options2);

      function refreshCallbacks() {
        // Needed to add new buttons to jQuery-extended object
        removeBtns.click(function() {
          var itemId = $(this).closest('tr').find('.id').text();
        });
      }
        </script>


    <?php include 'footer.php';?>



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
