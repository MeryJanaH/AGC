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

WHILE($dn=$rq->fetch()){
    $currentDateTime = date('Y-m-d H:i:s');
    $last = date('Y-m-d H:i:s', strtotime($dn['date_tdebut']));


$date1 = $currentDateTime;
$date2 = $last;

$hours = round(abs(strtotime($date2) - strtotime($date1))/3600,2);
if($hours <= "20"){
  ?>
    <div class="dropdown-item d-flex">
        <div class="flex">
            <b>NOTE :</b> Il reste around <?php echo floor($hours) ?> heurs pour le rendez-vous de <?php  echo name_client($dn['ID_client']); ?><br/> Pour plus de détails : <a href="">Cliquez ici</a><br>
            <small class="text-muted"><?php echo date("h:i:sa") ?></small>
        </div>
    </div>
  <?php
   $_SESSION['n']++;
}
}
?>
