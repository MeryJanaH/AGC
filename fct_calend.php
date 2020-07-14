<?php
require 'LBD.php';

if ($_POST['op']=="add") {
$req = $bdd->prepare("INSERT INTO Calendrier (date_tdébut,date_tfin,Description,Category,ID_client,ID_cm,Code_pj) VALUES ('" .$_POST['start']."','" .$_POST['end']."','" .$_POST['description']."','" .$_POST['category']."','" . $_POST['client'] ."','" . $_POST['comm'] ."','" . $_POST['projet'] ."')");
$req->execute();
}elseif ($_POST['op']=="edit"){
  require 'LBD.php';
//  $req=$bdd->query("SELECT * FROM Calendrier WHERE ");
  //$dn = $req->fetch();
}elseif ($_POST['op']=="sup") {
  require 'LBD.php';
  $req = $bdd->prepare("DELETE FROM `Calendrier` WHERE id =". $_POST['id'] ." ");
  $req->execute();
}elseif ($_POST['op']=="get"){
  $req = $bdd->prepare("SELECT * FROM `Calendrier` WHERE id = ".$_POST['id']." ");
  $req->execute();
  $res = $req->fetch();
  echo json_encode($res);
}




//session_start();
//echo $_SESSION['current_page'];
