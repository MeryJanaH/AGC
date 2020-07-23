<?php
require 'LBD.php';

if(isset($_POST['id'])){
  require 'functions.php';
  delet_com( $_POST['id'] );
}


  if ($_POST['op']=="edit"){
    $req = $bdd->prepare("UPDATE Clients SET Name='".$_POST['name']."', phnumber='".$_POST['phnumber']."',Code_pj='".$_POST['projet_id']."', Notes='".$_POST['notes']."', Source='".$_POST['source']."' ,nb_visite='".$_POST['nb_visite']."' WHERE ID_client='".$_POST['id_client']."'");
    $res=$req->execute();
    echo $res;
  }elseif ($_POST['op']=="supp") {
    $req = $bdd->prepare("DELETE FROM `Clients` WHERE ID_client ='".$_POST['id_client']."'");
    $res=$req->execute();
    echo $res;
  }
  elseif ($_POST['op']=="getid") {
    $req = $bdd->prepare("SELECT Code_pj FROM Projets WHERE ProjetName ='".$_POST['project_name']."' ");
    $req->execute();
    $res = $req->fetch();
    echo json_encode($res);
  }

  if ($_POST['op']=="susp") {
  $req = $bdd->prepare("UPDATE `Commerciaux` SET Suspendre=1 WHERE ID_cm ='".$_POST['id2']."' ");
  $res=$req->execute();
  }

  if ($_POST['op']=="no_susp") {
  $req = $bdd->prepare("UPDATE `Commerciaux` SET Suspendre=0 WHERE ID_cm ='".$_POST['id3']."' ");
  $res=$req->execute();
  }
?>
