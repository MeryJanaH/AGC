<?php

require 'LBD.php';
if(isset($_POST["proj_name"]))
{
    if (isset($_POST["add"]))
    {
        for ($a = 0; $a < count($_POST["proj_name"]); $a++)
        {
            $req = $bdd->prepare("INSERT INTO projets (ProjetName, type_p,Etages,Surface,Prix) VALUES ('" . $_POST["proj_name"][$a] . "','" . $_POST["proj_type"][$a]."','" . $_POST["proj_etage"][$a]."','" . $_POST["proj_surface"][$a]."','" . $_POST["proj_prix"][$a]."')");
            $req->execute();
        }
        header('Location: ui-projets.php');
    }
}
else {
  header('Location: ui-projets.php');
}
?>
