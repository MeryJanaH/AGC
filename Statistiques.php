<?php
session_start();

$_SESSION['current_page']="Graphe";

if(isset($_SESSION['login']) and $_SESSION['login']=="false" or !isset($_SESSION['login']))
{
      header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Statistiques</title>


    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

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

              <?php include('haute_bar.php'); ?>
<?php
require 'LBD.php';

$sql="SELECT ProjetName,IFNULL(Janv,0) AS Janv,IFNULL(Fév,0) AS Fév,IFNULL(Mars,0) AS Mars,IFNULL(Avril,0) AS Avril,IFNULL(Mai,0) AS Mai,IFNULL(Juin,0) AS Juin,IFNULL(Juil,0) AS Juil,IFNULL(Août,0) AS Août,
                        IFNULL(Sep,0) AS Sep,IFNULL(Oct,0) AS Oct,
                        IFNULL(Nov,0) AS Nov,IFNULL(Déc,0) AS Déc
FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                      LEFT JOIN
     (SELECT Code_pj, Visite,COUNT(Visite)as Janv , date_tdebut FROM Calendrier WHERE date_tdebut >= '2020-01-01 00:00:00' AND date_tdebut < '2020-02-01 00:00:00' AND Visite = 'Chantier' GROUP BY Code_pj) t2
                      ON t1.Code_pj = t2.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Fév , date_tdebut FROM Calendrier WHERE date_tdebut >= '2020-02-01 00:00:00' AND date_tdebut < '2020-03-01 00:00:00' AND Visite = 'Chantier' GROUP BY Code_pj) t3
                      ON t1.Code_pj = t3.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Mars , date_tdebut FROM Calendrier WHERE date_tdebut >= '2020-03-01 00:00:00' AND date_tdebut < '2020-04-01 00:00:00' AND Visite = 'Chantier' GROUP BY Code_pj) t4
                      ON t1.Code_pj = t4.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Avril , date_tdebut FROM Calendrier WHERE date_tdebut >= '2020-04-01 00:00:00' AND date_tdebut < '2020-05-01 00:00:00' AND Visite = 'Chantier' GROUP BY Code_pj) t5
                      ON t1.Code_pj = t5.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Mai , date_tdebut FROM Calendrier WHERE date_tdebut >= '2020-05-01 00:00:00' AND date_tdebut < '2020-06-01 00:00:00' AND Visite = 'Chantier' GROUP BY Code_pj) t6
                      ON t1.Code_pj = t6.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Juin , date_tdebut FROM Calendrier WHERE date_tdebut >= '2020-06-01 00:00:00' AND date_tdebut < '2020-07-01 00:00:00' AND Visite = 'Chantier' GROUP BY Code_pj) t7
                      ON t1.Code_pj = t7.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Juil , date_tdebut FROM Calendrier WHERE date_tdebut >= '2020-07-01 00:00:00' AND date_tdebut < '2020-08-01 00:00:00' AND Visite = 'Chantier' GROUP BY Code_pj) t8
                      ON t1.Code_pj = t8.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Août , date_tdebut FROM Calendrier WHERE date_tdebut >= '2020-08-01 00:00:00' AND date_tdebut < '2020-09-01 00:00:00' AND Visite = 'Chantier' GROUP BY Code_pj) t9
                      ON t1.Code_pj = t9.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Sep , date_tdebut FROM Calendrier WHERE date_tdebut >= '2020-09-01 00:00:00' AND date_tdebut < '2020-10-01 00:00:00' AND Visite = 'Chantier' GROUP BY Code_pj) t10
                      ON t1.Code_pj = t10.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Oct , date_tdebut FROM Calendrier WHERE date_tdebut >= '2020-10-01 00:00:00' AND date_tdebut < '2020-11-01 00:00:00' AND Visite = 'Chantier' GROUP BY Code_pj) t11
                      ON t1.Code_pj = t11.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Nov , date_tdebut FROM Calendrier WHERE date_tdebut >= '2020-10-01 00:00:00' AND date_tdebut < '2020-11-01 00:00:00' AND Visite = 'Chantier' GROUP BY Code_pj) t12
                      ON t1.Code_pj = t12.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Déc , date_tdebut FROM Calendrier WHERE date_tdebut >= '2020-11-01 00:00:00' AND date_tdebut < '2020-12-01 00:00:00' AND Visite = 'Chantier' GROUP BY Code_pj) t13
                      ON t1.Code_pj = t13.Code_pj";


$req=$bdd->query($sql);

 ?>

                <!-- Header Layout Content -->
                <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page">

                    <div class="container-fluid page__container">
                      <div class="card">
                          <div class="card-header card-header-large bg-white d-flex align-items-center">
                              <h4 class="card-header__title flex">Switch Toggle</h4>
                              <div class="d-flex align-items-center">
                                  <label for="chart-switch-toggle" class="mb-0">Show affiliate:</label>
                                  <div class="custom-control custom-checkbox-toggle ml-2">
                                      <input checked="" aria-checked="true" type="checkbox" id="chart-switch-toggle" class="custom-control-input" role="switch" data-toggle="chart" data-target="#ordersChartSwitch" data-add='{"data":{"datasets":[
                                      <?php $dn=$req->fetch(); ?>
                                      {"data":[<?php echo $dn['Janv']. "," .$dn[2] ; ?>,20,12,7,0,8,16,18,16,10,22],"backgroundColor":"#b2e599","label":"Hanae1"},
                                      <?php $dn=$req->fetch(); ?>
                                      {"data":[5,10,21,12,7,10,8,16,18,16,10,22],"backgroundColor":"#b2e549","label":"Wafae2"},
                                      {"data":[5,10,21,12,7,10,8,16,18,16,10,22],"backgroundColor":"#b205a9","label":"Walili1"},
                                      {"data":[5,10,21,12,7,10,8,16,18,16,10,22],"backgroundColor":"#b2e59b","label":"Walili2"},
                                      {"data":[5,10,21,12,7,10,8,16,18,16,10,22],"backgroundColor":"#b0e5c9","label":"Hanae1"},
                                      {"data":[5,10,21,12,7,10,8,16,18,16,10,22],"backgroundColor":"#b2e509","label":"Hanae2"},
                                      {"data":[5,10,21,12,7,10,8,16,18,16,10,22],"backgroundColor":"#a2e5d9","label":"Hanae3"}]}}'>
                                      <label class="custom-control-label" for="chart-switch-toggle"><span class="sr-only">Show affiliate</span></label>
                                      <?php $dn=$req->fetch(); ?>
                                      <script>
                                          var terrain = [25, 20, 30, 22, 17, 10, 18, 26, 28, 26, 20, 35];
                                      </script>
                                  </div>
                              </div>
                          </div>
                          <div class="card-body">
                              <p>Easily toggle an additional set of data with a simple interface based on the <code>data</code> attributes.</p>
                              <div class="chart">
                                  <canvas id="ordersChartSwitch" class="chart-canvas"></canvas>
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


    <!-- List.js -->
    <script src="assets/vendor/list.min.js"></script>
    <script src="assets/js/list.js"></script>


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



    <!-- Global Settings -->
    <script src="assets/js/settings.js"></script>

    <!-- Chart.js -->
    <script src="assets/vendor/Chart.min.js"></script>

    <!-- UI Charts Page JS -->
    <script src="assets/js/chartjs-rounded-bar.js"></script>
    <script src="assets/js/charts.js"></script>

    <!-- Chart.js Samples -->
    <script src="assets/js/page.ui-charts.js"></script>

</body>

</html>
