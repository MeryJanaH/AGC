<?php
  require 'LBD.php';

$k = $bdd->prepare("SELECT Code_pj FROM Projets WHERE ProjetName = 'Hanae 1'");
$k->execute();
$k = $k->fetch();
$s = $bdd->prepare("SELECT * FROM Calendrier WHERE YEAR(date_tdebut) ='2019' AND Code_pj ='".$k['Code_pj']."'");
$s->execute();
print_r(!$s->fetch());

?>
