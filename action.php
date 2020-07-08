<?php
//action.php
require 'LBD.php';

$input = filter_input_array(INPUT_POST);

$Projet = mysqli_real_escape_string($connect, $input["Projet"]);
$Type = mysqli_real_escape_string($connect, $input["Type"]);
$Etage = mysqli_real_escape_string($connect, $input["Etage"]);
$Surface = mysqli_real_escape_string($connect, $input["Surface"]);
$Prix = mysqli_real_escape_string($connect, $input["Prix"]);

if($input["action"] === 'edit')
{
 $sql= $bdd->prepare("UPDATE Commerciaux SET ProjetName=$Projet ,type_p=$Type,Etages=$Etage,Surface=$Surface,Prix=$Prix");
 $sql->execute();

}
if($input["action"] === 'delete')
{
  $req = $bdd->prepare("DELETE FROM Projets WHERE Code_pj = ID");
  $req->execute();
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>
