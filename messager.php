<?php
require 'LBD.php';
require 'functions.php';

       $_SESSION['enrg'] = "false";
       
       $inter=email_exist($_POST['email_2']);
       if($inter == "true")
       {
         $_SESSION['enrg'] = "true";
         header('Location: signup.php');
       }
       else
       {
         $default_password = default_password(8);
         $lien = "http://localhost/AGC/login.php";
         $txt = "Voici votre mot de passe pour se connecter à AGC : ".'<br/>'."MDP : ".$default_password.'<br/>'."Adresse email : ".$_POST['email_2'].'<br/>'." Vous pouvez utiliser le lien suivent : ".$lien;

           $req = $bdd->prepare('INSERT INTO Commerciaux (Email, Password) VALUES(?, ?)');
           $req->execute(array($_POST['email_2'], $default_password));

         first_mail($_SESSION['email'], $_POST['email_2'], 'AGC',$txt);
         header('Location: signup.php');
       }
?>
