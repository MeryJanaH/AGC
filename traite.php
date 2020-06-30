<?php
require 'functions.php';
session_start();
?>


<?php
          if (!isset($_POST['email_2']) && !isset($_SESSION['password_2'])) {
              session_destroy();
              unset($_SESSION);
              header('Location: login.php');
            }
            else {
              $res=login($_POST['email_2'],$_POST['password_2']);

                if ($res=="Utilisateur Non Enregistré" or $res =="ERROR_Syntaxe") {
                    $_SESSION['login']=false;
                    header('Location: login.php');
                }else
                    header('Location: index.php');
            }
?>
