<?php
//action.php
require 'LBD.php';

$input = filter_input_array(INPUT_POST);

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

echo json_encode($input);

?>
