<div class="card-header card-header-large bg-white d-flex align-items-center">
    <h4 class="card-header__title flex">Visualisation des Statistiques de différents projets :</h4>
    <div class="d-flex align-items-center">
        <div class="custom-control custom-checkbox-toggle ml-2">

        <?php  $colors = array("#b2e599", "#b205a9", "#b2e59b", "#b0e5c9", "#b2e509", "#a2e5d9"); ?>

            <input checked="" aria-checked="true" type="checkbox" id="chart-switch-toggle" class="custom-control-input" role="switch" data-toggle="chart" data-target="#ordersChartSwitch" data-add='{"data":{"datasets":[

            <?php
            $req2 = $bdd->prepare("SELECT COUNT(`Code_pj`) AS count_pj FROM `projets`");
            $dn2 = $req2 -> execute();
            $dn2 = $dn2->fetch();

            for ($x = 1; $x <= $dn2['count_pj']; $x++) {

              $req3 = $bdd->prepare("SELECT ProjetName FROM `projets` WHERE Code_pj=$x");
              $dn3 = $req3 -> execute();
              $dn3 = $dn3->fetch();

              if($x != $dn2['count_pj']){ ?>
              {"data":[<?php echo $dn['Janv']. "," .$dn[2] ; ?>,20,12,7,0,8,16,18,16,10,22],"backgroundColor":"#b2e599","label":$dn3}, <?php
              }else { ?>
                {"data":[<?php echo $dn['Janv']. "," .$dn[2] ; ?>,20,12,7,0,8,16,18,16,10,22],"backgroundColor":"#b2e599","label":$dn3} <?php
              }

            } ?> ]}}'>



            <label class="custom-control-label" for="chart-switch-toggle"><span class="sr-only">Show affiliate</span></label>
            <?php $dn=$req->fetch(); ?>
            <script>
                var terrain = [25, 20, 30, 22, 17, 10, 18, 26, 28, 26, 20, 35];
            </script>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="chart">
        <canvas id="ordersChartSwitch" class="chart-canvas"></canvas>
    </div>
</div>
