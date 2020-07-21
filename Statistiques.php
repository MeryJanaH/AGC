<?php
require 'LBD.php';
require 'functions.php';
$_SESSION['current_page']="Graphe";

if(isset($_SESSION['login']) and $_SESSION['login']=="false" or !isset($_SESSION['login']))
{
      header('Location: login');
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="assets/images/logo.png" rel="shortcut icon" type="image/x-icon" />
    <title>Statistiques</title>

    <style>
    canvas {
      -moz-user-select: none;
      -webkit-user-select: none;
      -ms-user-select: none;
    }
    </style>

    <title>Statistiques</title>

    <!-- Simplebar -->
    <link type="text/css" href="assets/vendor/simplebar.min.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="assets/css/app.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="assets/css/vendor-material-icons.css" rel="stylesheet">
    <!-- Classement -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

    <!-- Year picker -->
    <link rel="stylesheet" href="assets/css/yearpicker.css" />


</head>

<body>

    <div class="preloader"></div>

    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px" data-fullbleed>
        <div class="mdk-drawer-layout__content">

            <!-- Header Layout -->
            <div class="mdk-header-layout js-mdk-header-layout" data-has-scrolling-region>

              <?php include('haute_bar.php');
              function tables($id,$year){ ?>
               <div class="card card-form">
                   <div class="row no-gutters">
                       <div class="col-lg-16 card-form__body border-left">
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
                                         </tr>
                                       </thead>
                                       <tbody class="list">
                                         <?php
                                         clients_par_source($id,$year);
                                         ?>
                                       </tbody>
                                 </table>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="container-fluid page__container">
                       <div class="card card-form">
                           <div class="row no-gutters">
                               <div class="col-lg-16 card-form__body border-left">
                                   <div id="contacts2">
                                     <table class="table mb-0 thead-border-top-0">
                                           <thead>
                                               <tr>
                                                 <th class="sort" data-sort="Pj">Projets</th>
                                                 <th class="sort" data-sort="bureau">Clients au bureau</th>
                                                 <th class="sort" data-sort="c_projet">Clients par projet</th>
                                                 <th class="sort" data-sort="vente">Ventes</th>
                                               </tr>
                                             </thead>
                                             <tbody class="list">

                                               <?php
                                               Total_client_projets($id,$year);
                                               ?>
                                             </tbody>
                                       </table>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <?php
             }

             function annee($year)
             {
               require 'LBD.php';

               $s1= $bdd->prepare("SELECT IFNULL(Janv,0) AS Janv
                    FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                                      LEFT JOIN
                     (SELECT Code_pj, Visite,COUNT(Visite)as Janv , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='01' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t2
                                      ON t1.Code_pj = t2.Code_pj");


                $s2=$bdd->prepare("SELECT IFNULL(Fév,0) AS Fév
                     FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                                    LEFT JOIN
                    (SELECT Code_pj, Visite,COUNT(Visite)as Fév , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='02' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t3
                                    ON t1.Code_pj = t3.Code_pj");

                $s3=$bdd->prepare("SELECT IFNULL(Mars,0) AS Mars
                     FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                                     LEFT JOIN
                     (SELECT Code_pj, Visite,COUNT(Visite)as Mars , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='03' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t4
                                     ON t1.Code_pj = t4.Code_pj");

               $s4=$bdd->prepare("SELECT IFNULL(Avril,0) AS Avril
                    FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                                    LEFT JOIN
                    (SELECT Code_pj, Visite,COUNT(Visite)as Avril , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='04' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t5
                                    ON t1.Code_pj = t5.Code_pj");

                $s5=$bdd->prepare("SELECT IFNULL(Mai,0) AS Mai
                     FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                                     LEFT JOIN
                     (SELECT Code_pj, Visite,COUNT(Visite)as Mai , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='05' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t6
                                     ON t1.Code_pj = t6.Code_pj");

                 $s6=$bdd->prepare("SELECT IFNULL(Juin,0) AS Juin
                      FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                                       LEFT JOIN
                       (SELECT Code_pj, Visite,COUNT(Visite)as Juin , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='06' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t7
                                       ON t1.Code_pj = t7.Code_pj");


                 $s7=$bdd->prepare("SELECT IFNULL(Juil,0) AS Juil
                      FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                                      LEFT JOIN
                      (SELECT Code_pj, Visite,COUNT(Visite)as Juil , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='07' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t8
                                      ON t1.Code_pj = t8.Code_pj");

                $s8=$bdd->prepare("SELECT IFNULL(Août,0) AS Août
                     FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                                     LEFT JOIN
                     (SELECT Code_pj, Visite,COUNT(Visite)as Août , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='08' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t9
                                     ON t1.Code_pj = t9.Code_pj");

                 $s9=$bdd->prepare("SELECT IFNULL(Sep,0) AS Sep
                      FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                                      LEFT JOIN
                      (SELECT Code_pj, Visite,COUNT(Visite)as Sep , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='09' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t10
                                      ON t1.Code_pj = t10.Code_pj");

                  $s10=$bdd->prepare("SELECT IFNULL(Oct,0) AS Oct
                       FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                                       LEFT JOIN
                       (SELECT Code_pj, Visite,COUNT(Visite)as Oct , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='10' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t11
                                       ON t1.Code_pj = t11.Code_pj");

                 $s11=$bdd->prepare("SELECT IFNULL(Nov,0) AS Nov
                      FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                                      LEFT JOIN
                      (SELECT Code_pj, Visite,COUNT(Visite)as Nov , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='11' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t12
                                      ON t1.Code_pj = t12.Code_pj");

                  $s12=$bdd->prepare("SELECT IFNULL(Déc,0) AS Déc
                       FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                                       LEFT JOIN
                       (SELECT Code_pj, Visite,COUNT(Visite)as Déc , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='12' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t13
                                       ON t1.Code_pj = t13.Code_pj");

                 $s1->execute();

                 $s2->execute();

                 $s3->execute();

                 $s4->execute();

                 $s5->execute();

                 $s6->execute();

                 $s7->execute();

                 $s8->execute();

                 $s9->execute();

                 $s10->execute();

                 $s11->execute();

                 $s12->execute();

                 $k= $bdd->prepare("SELECT COUNT(Code_pj) AS count_pj FROM Projets");
                 $k->execute();
                 $k2 = $k->fetch();

               $i = 0;
               for ($x = 1; $x <= $k2['count_pj']; $x++) {

               $b12 = $s12->fetch();
               $b11 = $s11->fetch();
               $b10 = $s10->fetch();
               $b9 = $s9->fetch();
               $b8 = $s8->fetch();
               $b7 = $s7->fetch();
               $b6 = $s6->fetch();
               $b5 = $s5->fetch();
               $b4 = $s4->fetch();
               $b3 = $s3->fetch();
               $b2 = $s2->fetch();
               $b1 = $s1->fetch();

               $mois[$i] = array($b1, $b2, $b3, $b4, $b5, $b6, $b7, $b8, $b9, $b10, $b11, $b12);
               $i++;
               }
               return $mois;
             }

         function years($year){
           ?>
           <div class="tab-pane  active show fade" id="Janvier">
             <?php $id="Janvier"; tables($id, $year); ?>
           </div>
           <div class="tab-pane fade" id="Fevrier">
             <?php $id="Fevrier"; tables($id,$year); ?>
           </div>
           <div class="tab-pane fade" id="Mars">
               <?php $id="Mars"; tables($id,$year); ?>
           </div>
           <div class="tab-pane fade" id="Avril">
               <?php $id="Avril"; tables($id,$year); ?>
           </div>
           <div class="tab-pane fade" id="Mai">
               <?php $id="Mai"; tables($id,$year); ?>
           </div>
           <div class="tab-pane fade" id="Juin">
               <?php $id="Juin"; tables($id,$year); ?>
           </div>
           <div class="tab-pane fade" id="Juillet">
               <?php $id="Juillet"; tables($id,$year); ?>
           </div>
           <div class="tab-pane fade" id="Aout">
               <?php $id="Aout"; tables($id,$year); ?>
           </div>
           <div class="tab-pane fade" id="Septembre">
               <?php $id="Septembre"; tables($id,$year); ?>
           </div>
           <div class="tab-pane fade" id="Octobre">
               <?php $id="Octobre"; tables($id,$year); ?>
           </div>
           <div class="tab-pane fade" id="Novembre">
               <?php $id="Novembre"; tables($id,$year); ?>
           </div>
           <div class="tab-pane fade" id="Decembre">
               <?php $id="Decembre"; tables($id,$year); ?>
           </div>
           <?php
         }


$req2 = $bdd->prepare("SELECT COUNT(`Code_pj`) AS count_pj FROM `Projets`");
$d1 = $req2 -> execute();
$d2 = $req2->fetch();

 ?>

                <!-- Header Layout Content -->
                <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page">
                    <div>

                      <div class="container">
                         <div class="main">
                           <input type="text" class="yearpicker form-control" value="" />
                         </div>
                       </div>

                       <div class="row">
                           <div class="col-lg">
                               <div class="card">
                                   <div class="card-header card-header-tabs-basic nav" role="tablist">
                                       <a href="#Janvier" class="active" data-toggle="tab" role="tab" aria-controls="activity_all" aria-selected="true">Janvier</a>
                                       <a href="#Fevrier" data-toggle="tab" role="tab"  aria-selected="false">Février</a>
                                       <a href="#Mars" data-toggle="tab" role="tab" aria-selected="false">Mars</a>
                                       <a href="#Juin" data-toggle="tab" role="tab" aria-selected="false">Juin</a>
                                       <a href="#Juillet" data-toggle="tab" role="tab"  aria-selected="false">Juillet</a>
                                       <a href="#Aout" data-toggle="tab" role="tab" aria-selected="false">Août</a>
                                       <a href="#Septembre" data-toggle="tab" role="tab" aria-selected="false">Septembre</a>
                                       <a href="#Octobre" data-toggle="tab" role="tab" aria-selected="false">Octobre</a>
                                       <a href="#Novembre" data-toggle="tab" role="tab"  aria-selected="false">Novembre</a>
                                       <a href="#Decembre" data-toggle="tab" role="tab" aria-selected="false">Décembre</a>
                                   </div>
                                   <div class="card-body tab-content">
                                     <?php if(isset($_GET['year'])){
                                                 years($_GET['year']);
                                           } else {
                                                 years(date("Y"));
                                            } ?>
                                     </div>
                                   </div>
                               </div>
                           </div>

                      <div style="width: 100%">
                    		<canvas id="canvas" style="@media only screen and (max-width: 600px) {
                                                    body {
                                                      height='200';
                                                    }
                                                  }" class="chartjs-render-monitor"></canvas>
                    	</div>
                    	<script>

                    		var chartData = {
                    			labels: ['Janv', 'Fév', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'],
                    			datasets: [
                          <?php
                          if(isset($_GET['year'])){
                               $mois=annee($_GET['year']);
                          } else {
                               $mois=annee(date("Y"));
                          }

                          $year=date("Y");
                          $n=0;
                          $colors = array("#00008B", "#D2691E", "#b2e59b", "##FF7F50", "#b2e509", "#a2e5d9","#b2e599","#483D8B","#FF1493","#8B0000","#008000","#66CDAA");
                          $req3 = $bdd->prepare("SELECT COUNT(Code_pj) AS count_pj,ProjetName FROM `Projets`");
                          $req3 -> execute();
                          $d2 = $req3->fetch();
                          //$dn5 = $req->execute();
                          //$dn = $req->fetch();
                          for ($x = 0; $x < $d2['count_pj']; $x++) {
                            if($x != ($d2['count_pj']-1)){ ?>
                            {type: 'bar', label:'<?php echo $d2['ProjetName']; ?>', data:[<?php echo $mois[$x][0][0]. "," .$mois[$x][1][0]. "," .$mois[$x][2][0]. ","
                                              .$mois[$x][3][0]. "," .$mois[$x][4][0]. ",".$mois[$x][5][0]. "," .$mois[$x][6][0]. "," .$mois[$x][7][0]. ","
                                              .$mois[$x][8][0]. "," .$mois[$x][9][0]. "," .$mois[$x][10][0]. "," .$mois[$x][11][0];
                                                                                       ?>], backgroundColor:'<?php echo $colors[$n++]; ?>',borderColor: 'white',
                    				borderWidth: 1}, <?php
                            }else { ?>
                              {type: 'bar', label:'<?php echo $d2['ProjetName']; ?>', data:[<?php echo $mois[$x][0][0]. "," .$mois[$x][1][0]. "," .$mois[$x][2][0]. ","
                                                .$mois[$x][3][0]. "," .$mois[$x][4][0]. ",".$mois[$x][5][0]. "," .$mois[$x][6][0]. "," .$mois[$x][7][0]. ","
                                                .$mois[$x][8][0]. "," .$mois[$x][9][0]. "," .$mois[$x][10][0]. "," .$mois[$x][11][0];
                                                                                         ?>], backgroundColor:'<?php echo $colors[$n++]; ?>',borderColor: 'white',
                      				borderWidth: 1} <?php
                            }
                          } ?>
                          ]
                    		};
                    		window.onload = function() {
                    			var ctx = document.getElementById('canvas').getContext('2d');
                    			window.myMixedChart = new Chart(ctx, {
                    				type: 'bar',
                    				data: chartData,
                    				options: {
                    					responsive: true,
                              scales: {
                                    yAxes: [{
                                        ticks: {
                                            min: 0,
                                            stepSize: 1
                                        }
                                    }]
                                },
                    					title: {
                    						display: true,
                    						text: 'La cadence de visites de clients au chantier pour chaque projet'
                    					},
                    					tooltips: {
                    						mode: 'index',
                    						intersect: true
                    					}
                    				}
                    			});
                    		};

                    	</script>

                    </div>


                </div>
                <!-- // END header-layout__content -->

            </div>
            <!-- // END header-layout -->

        </div>
        <!-- // END drawer-layout__content -->


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
      var contactList = new List('contacts2', options2);

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


    <!-- App -->
    <script src="assets/js/app.js"></script>

    <!-- App Settings (safe to remove) -->
    <script src="assets/js/app-settings.js"></script>

    <script src="assets/vendor/chart.min.js"></script>
    <script src="assets/vendor/utils.js"></script>

    <!-- Picker year -->
    <script src="assets/js/yearpicker.js"></script>
    <script>
      $(document).ready(function() {
        $(".yearpicker").yearpicker({
          year: <?php if(isset($_GET['year']) && $_GET['year']>="2012" && $_GET['year']<="3000"){echo $_GET['year'];}else{echo date("Y");} ?>,
          startYear: 2012,
          endYear: 3000
        });
/*$('.yearpicker-items').on('click', function(e){
          console.log(document.querySelector('.selected').innerText);
  });*/

      });
    </script>


</body>

</html>
