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

    <title>Combo Bar-Line Chart</title>

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

 if(isset($_GET['year'])){
      $req=annee($_GET['year']);
 } else {
      $req=annee(date("Y"));
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
                          $n=0;
                          $colors = array("#00008B", "#D2691E", "#b2e59b", "##FF7F50", "#b2e509", "#a2e5d9","#b2e599","#483D8B","#FF1493","#8B0000","#008000","#66CDAA");
                          $req3 = $bdd->prepare("SELECT ProjetName FROM `Projets`");
                          $dn3 = $req3 -> execute();
                          $dn = $req -> execute();
                          for ($x = 1; $x <= $d2['count_pj']; $x++) {
                            $dn4 = $req3->fetch();
                            $dn=$req->fetch();
                            if($x != $d2['count_pj']){ ?>
                            {type: 'bar', label:'<?php echo $dn4['ProjetName']; ?>', data:[<?php echo $dn[1]. "," .$dn[2]. "," .$dn[3]. "," .$dn[4]. "," .$dn[5].
                                                                                      "," .$dn[6]. "," .$dn[7]. "," .$dn[8]. "," .$dn[9]. "," .$dn[10]. "," .$dn[11].
                                                                                     "," .$dn[12] ; ?>], backgroundColor:'<?php echo $colors[$n++]; ?>',borderColor: 'white',
                    				borderWidth: 1}, <?php
                            }else { ?>
                              {type: 'bar', label:'<?php echo $dn4['ProjetName']; ?>', data:[<?php echo $dn[1]. "," .$dn[2]. "," .$dn[3]. "," .$dn[4]. "," .$dn[5].
                                                                                        "," .$dn[6]. "," .$dn[7]. "," .$dn[8]. "," .$dn[9]. "," .$dn[10]. "," .$dn[11].
                                                                                       "," .$dn[12] ; ?>], backgroundColor:'<?php echo $colors[$n++]; ?>',borderColor: 'white',
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

                    		document.getElementById('randomizeData').addEventListener('click', function() {
                    			chartData.datasets.forEach(function(dataset) {
                    				dataset.data = dataset.data.map(function() {
                    					return randomScalingFactor();
                    				});
                    			});
                    			window.myMixedChart.update();
                    		});
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
