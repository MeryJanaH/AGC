<?php
require 'BDD/LBD.php';
require 'functions.php';

if(isset($_SESSION['login']) and $_SESSION['login']=="false" or !isset($_SESSION['login']) or $_SESSION['user']!="admin")
{
      header('Location: login');
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Créer un compte</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- App CSS -->
    <link type="text/css" href="assets/css/app.css" rel="stylesheet">


</head>

<body class="layout-login-centered-boxed">

    <div class="layout-login-centered-boxed__form">
        <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-4 navbar-light">
            <a href="Nouveau" class="navbar-brand text-center mb-2 mr-0 flex-column" style="min-width: 0">
                <img class="navbar-brand-icon mb-3" src="assets/images/logo.png" width="43" alt="Flat">
                <span>Créer un compte</span>
            </a>
        </div>
        <?php
        if(isset($_SESSION['send']))
        {
            if($_SESSION['send']=="false")
            {
              ?>
              <div class="alert alert-danger" role="alert">
                  <strong>Erreur - </strong> Veuillez réessayer une autre fois
              </div>
              <?php
            }
            elseif ($_SESSION['send']!="NULL")
            {
              ?>
                  <div class="alert alert-success" role="alert">
                      <strong>Succès - </strong> vous avez créer un compte commercial avec succès!
                  </div>
            <?php
            $_SESSION['send']="NULL";
            }
        }
        if(isset($_POST['submit']))
        {
            $_SESSION['enrg'] = "false";

            $inter=email_exist($_POST['email_2']);
            if($inter == "true")
            {
              $_SESSION['enrg'] = "true";
              //header('Location: Nouveau.php');
            }
            else
            {

              $to = $_POST['email_2'];
              $subject = 'AGC';

              $default_password = default_password();
              $lien = "https://guesspromo.ga/login";
              $message = "Voici votre mot de passe pour se connecter à AGC : ".'<br/>'."MDP : ".$default_password.'<br/>'."Adresse email : ".$_POST['email_2'].'<br/>'." Vous pouvez utiliser le lien suivant : ".$lien;

              $headers = 'From: GUESSPROMO '.$_SESSION['email'] . "\r\n" ;
              $headers .='Reply-To: '. $to . "\r\n" ;
              $headers .='X-Mailer: PHP/' . phpversion();
              $headers .= "MIME-Version: 1.0\r\n";
              $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

              $req = $bdd->prepare('INSERT INTO Commerciaux (Email, Password) VALUES(?, ?)');
              $req->execute(array($_POST['email_2'], md5($default_password)));

              if(mail($to,$subject,$message,$headers))
                $_SESSION['send']="true";
              else
                $_SESSION['send']="false";
              

              //first_mail($_SESSION['email'], $_POST['email_2'], 'AGC',$txt);
              header('Location: Nouveau');
            }
        }

        if(isset($_SESSION['enrg']))
        {
          if($_SESSION['enrg'] == "true")
          {
            ?>

            <div class="alert alert-danger" role="alert">
                <strong>Erreur - </strong> Email déjà enregistré
            </div>
            <?php
            $_SESSION['enrg'] = "None";
          }
        }


                ?>
        <div class="card card-body">
            <form action="#messager" method="POST">
                <div class="form-group">
                    <label class="text-label" for="email_2">Adresse email:</label>
                    <div class="input-group input-group-merge">
                        <input id="email_2" name="email_2" type="email" required="" class="form-control form-control-prepended" placeholder="user@exemple.com">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                  <button class="btn btn-primary mb-2" name="submit" type="submit">Créer un compte</button><br>
                </div>
            </form>
            <a href="/"><button type="button" class="btn btn-block btn-primary">Retourner à l'accueil</button></a>
        </div>
    </div>


    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>


</body>

</html>
