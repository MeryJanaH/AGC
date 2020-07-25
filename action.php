<?php
session_start();
if(isset($_SESSION['login']) and $_SESSION['login']=="false" or !isset($_SESSION['login']))
{
      header('Location: login');
}
//action.php
require 'BDD/LBD.php';

$input = filter_input_array(INPUT_POST);

if(isset($_GET['data']) and $_GET['data']=="clients")
{
  $Nom = $input["Name"];
  $num = $input["phnumber"];
  $Notes = $input["Notes"];
  $Source = $input["Source"];
  $Projet = $input["Code_pj"];
  $id= $input["ID_client"];

  if($input["action"] === 'edit')
  {
   $sql= $bdd->prepare("UPDATE Clients SET Name= '" . $Nom . "',phnumber= '" . $num . "',Notes= '" . $Notes . "',Source= '" . $Source . "', Code_pj= '" . $Projet . "' WHERE ID_client= '" . $id . "'");
   $sql->execute();
  }
  if($input["action"] === 'delete')
  {
    $req = $bdd->prepare("DELETE FROM Clients WHERE ID_client = $id");
    $req->execute();
  }
}
else {
  $Projet = $input["ProjetName"];
  $Type = $input["type_p"];
  $Etage = $input["Etages"];
  $Surface = $input["Surface"];
  $Prix = $input["Prix"];
  $id= $input["Code_pj"];

  if($input["action"] === 'edit')
  {
   $sql= $bdd->prepare("UPDATE Projets SET ProjetName= '" . $Projet . "' ,type_p= '" . $Type . "',Etages= '" . $Etage . "',Surface= '" . $Surface . "',Prix= '" . $Prix . "' WHERE Code_pj= '" . $id . "'");
   $sql->execute();

  }
  if($input["action"] === 'delete')
  {
    $req = $bdd->prepare("DELETE FROM Projets WHERE Code_pj = $id");
    $req->execute();
  }
}

?>
