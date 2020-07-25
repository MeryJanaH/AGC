<?php
session_start();
require 'LBD.php';
function name_client($id){
  require 'LBD.php';
  $rq = $bdd->prepare(" SELECT Name FROM Clients WHERE ID_client=$id ");
  $rq->execute();
  $req = $rq->fetch();
  return $req['Name'];
}

$rq = $bdd->prepare(" SELECT * FROM Calendrier WHERE Category='bg-primary' ORDER BY date_tdebut ASC ");
$rq->execute();
$n=0;
$newtoast=0;
WHILE($dn=$rq->fetch()){
    $currentDateTime = date('Y-m-d H:i:s');
    $last = date('Y-m-d H:i:s', strtotime($dn['date_tdebut']));


$date1 = $currentDateTime;
$date2 = $last;

$hours = round((strtotime($date2) - strtotime($date1))/3600,2);
$mins = abs(((strtotime($date2) - strtotime($date1))/3600)-$hours);

if($hours <= "16" && $hours >= "0" && $mins > "0"){
  ?>
            <div class="navbar-notifications-menu__content" data-simplebar>
                  <div class="dropdown-item d-flex">
                    <div class="flex">
                        <b>NOTE :</b> Il reste presque <?php if($hours < "1"){echo "moins d'une heure";}else{ echo floor($hours)."h";} ?>  pour le rendez-vous de <?php  echo name_client($dn['ID_client']); ?> <br/>
                        <small class="text-muted"><?php echo $last; ?></small>
                    </div>
                  </div>
            </div>
  <?php
   $n++;
}
if ($hours < "1" && $hours >= "0" && $mins > "0") {
  $newtoast++;
}
}
?>
<input type="hidden" id="h_toast" value="<?php echo $newtoast; ?>"> </input>
<input type="hidden" id="div_nb" value="<?php echo $n; ?>"> </input>
