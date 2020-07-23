<?php
require 'functions.php';


    $res=login($_POST['email_2'],md5($_POST['password_2']));

      if ($res=="Utilisateur Non Enregistré" or $res =="ERROR_Syntaxe" or $res == "Utilisateur est suspendu") {
          $_SESSION['login']="false";
          header('Location: login');
      }else{
          if(isset($_POST['remember']))
          {
            //remember for 7 days
            setcookie('Adresse_email', $_POST['email_2'],time()+60*60*24*7);
            setcookie('mot_de_passe', $_POST['password_2'],time()+60*60*24*7);
          }
          if(premier_login($_POST['email_2'])=="true" and $_SESSION['user']!="admin")
          {
            $_SESSION['log_befor']="true";
            header('Location: registration');
          }
          else
          {
            $_SESSION['login']="true";
            header('Location: /');
          }
      }
?>
