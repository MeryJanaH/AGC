<?php
require 'LBD.php';
session_start();
?>

<?php
  $req = $bdd->prepare("SELECT * FROM Admin WHERE Email='meryem.annouar@ieee.org' AND Password='Mery123' ");
  $req->execute();
  $res = $req->fetch();
  print_r($res['ID_admin']);
?>
