<?php
require 'LBD.php';

if ($_POST['op']=="add") {
$req = $bdd->prepare("INSERT INTO Calendrier (date_tdebut,date_tfin,Description,Category,Visite,ID_client,ID_cm,Code_pj) VALUES ('" .$_POST['start']."','" .$_POST['end']."','" .$_POST['description']."','" .$_POST['category']."','" .$_POST['visite']."','" . $_POST['client'] ."','" . $_POST['comm'] ."','" . $_POST['projet'] ."')");
$req->execute();
}elseif ($_POST['op']=="modif"){
  require 'LBD.php';
  $req = $bdd->prepare("UPDATE `Calendrier` SET `Description`='".$_POST['description']."',`Category`='".$_POST['category']."',`Visite`='".$_POST['visite']."',`ID_client`='".$_POST['client']."',`ID_cm`='".$_POST['commercial']."',`Code_pj`='".$_POST['projet']."' WHERE id='".$_POST['id']."' ");
    $req->execute();
}elseif ($_POST['op']=="sup") {
  require 'LBD.php';
  $req = $bdd->prepare("DELETE FROM `Calendrier` WHERE id =". $_POST['id'] ." ");
  $req->execute();
}elseif ($_POST['op']=="get"){
  $req = $bdd->prepare("SELECT * FROM `Calendrier` WHERE id = ".$_POST['id']." ");
  $req->execute();
  $res = $req->fetch();
  echo json_encode($res);
}elseif ($_POST['op']=="time"){
  $req = $bdd->prepare("UPDATE `Calendrier` SET `date_tdebut`='" .$_POST['start']."',`date_tfin`='" . $_POST['end']. "' WHERE id ='" .$_POST['id']."' ");
  $res = $req->execute();
  echo $res;
  echo implode(" ",$_POST);
}


//session_start();
//echo $_SESSION['current_page'];
