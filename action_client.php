<?php
//action_table_des_clients.php
require 'LBD.php';

$input = filter_input_array(INPUT_POST);

  $Projet = $input["Code_pj"];
  $Source = $input["Source"];
  $Notes = $input["Notes"];
  $num = $input["phnumber"];
  $Nom = $input["Name"];
  $id= $input["ID_client"];

  if($input["action"] === 'edit')
  {
   $sql= $bdd->prepare("UPDATE Clients SET Code_pj= '" . $Projet . "' ,Source= '" . $Source . "',Notes= '" . $Notes . "',phnumber= '" . $num . "',Name= '" . $Nom . "' WHERE ID_client= '" . $id . "'");
   $sql->execute();
  }
  if($input["action"] === 'delete')
  {
    $req = $bdd->prepare("DELETE FROM Clients WHERE ID_client = $id");
    $req->execute();
  }
?>
