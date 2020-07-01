<?php
require 'LBD.php';
require 'functions.php';
session_start();

       $inter=email_exist($_POST['email_2']);
       if($inter == true)
       { ?>
         <div class="alert alert-danger" role="alert">
             <strong>Error - </strong> Username Or Password Incorrect
         </div>
         <?php
       }
       else
       {
         $default_password = default_password(8);
         $lien = "http://localhost/AGC/login.php";
         $txt = "Voici votre mot de passe pour se connecter à AGC : ".'<br/>'."MDP : ".$default_password.'<br/>'."Adresse email : ".$_POST['email_2'].'<br/>'." Vous pouvez utiliser le lien suivent : ".$lien;
        first_mail($_SESSION['email'], $_POST['email_2'], 'AGC',$txt);
       }

?>
