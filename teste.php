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
<!--
else {
  ?>
      <div class="alert alert-danger" role="alert">
          <strong>Error - </strong> Username Or Password Incorrect
      </div>
-->

<!--$default_password = default_password(8);
$mailTo = $_POST['email_2'];
$headers = "De: GUESSPROMO";
$lien = "http://localhost/AGC/login.php";
$txt = "Voici votre mot de passe pour accéder à AGC : \n MDP : ".$default_password."\n Vous pouvez accéder via le lien suivent en utilisant ce MDP et votre adresse mail:".$lien;
-->
