<?php
require 'functions.php';
session_start();
?>

<?php

    $res=login($_POST['email_2'],$_POST['password_2']);


      if ($res=="Utilisateur Non Enregistré" or $res =="ERROR_Syntaxe") {
          $_SESSION['login']="false";
          header('Location: login.php');
      }else{
          if(isset($_POST['remember']))
          {
            //remember for 7 days
            setcookie('Adresse_email', $_POST['email_2'],time()+60*60*7);
            setcookie('mot_de_passe', $_POST['password_2'],time()+60*60*7);
          }
          if(premier_login($_POST['email_2'], $_POST['password_2'])=="true" and $_SESSION['user']!="admin")
          {
            header('Location: registration.php');
          }
          else
          {
            $_SESSION['login']="true";
            header('Location: index.php');
          }
      }
?>
