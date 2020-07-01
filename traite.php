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
          $_SESSION['login']="true";
          header('Location: index.php');
      }
?>
