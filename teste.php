<?php
require 'LBD.php';
require 'functions.php';
 $inter=email_exist($_POST['email_2']);
 echo $inter;
?>
<!--
  $req = $bdd->prepare("SELECT * FROM Admin WHERE Email='meryem.annouar@ieee.org' AND Password='Mery123' ");
  $req->execute();
  $res = $req->fetch();
  print_r($res['ID_admin']);
?>-->
<!--
else {
  ?>
      <div class="alert alert-danger" role="alert">
          <strong>Error - </strong> Username Or Password Incorrect
      </div>
-->
