<?php
require 'LBD.php';
require 'functions.php';


$sql= $bdd->prepare("UPDATE Commerciaux SET lastLog = NOW() WHERE Email = 'Yassine.Oukassou@ieee.org' AND Password= 'oks123'");
$sql->execute();
?>
