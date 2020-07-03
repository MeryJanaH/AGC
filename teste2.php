<?php
require 'LBD.php';
//require 'functions.php';

function delet_com($v_id)
{
  require 'LBD.php';
  $req = $bdd->prepare("DELETE FROM Commerciaux WHERE Commerciaux.ID_cm =:id_table");
  $req->bindParam(':id_table',$v_id);
  $req->execute();
}

delet_com(5);
/*
$sql= $bdd->prepare("UPDATE Commerciaux SET lastLog = NOW() WHERE Email = 'Yassine.Oukassou@ieee.org' AND Password= 'oks123'");
$sql->execute();*/
?>
