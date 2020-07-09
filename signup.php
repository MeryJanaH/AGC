<?php
require 'LBD.php';
require 'functions.php';

if(isset($_SESSION['login']) and $_SESSION['login']=="false" or !isset($_SESSION['login']) or $_SESSION['user']!="admin")
{
      header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Simplebar -->
    <link type="text/css" href="assets/vendor/simplebar.min.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="assets/css/app.css" rel="stylesheet">
    <link type="text/css" href="assets/css/app.rtl.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="assets/css/vendor-material-icons.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-material-icons.rtl.css" rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="assets/css/vendor-fontawesome-free.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">

    <!-- ion Range Slider -->
    <link type="text/css" href="assets/css/vendor-ion-rangeslider.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-ion-rangeslider.rtl.css" rel="stylesheet">





</head>

<body class="layout-login-centered-boxed">





    <div class="layout-login-centered-boxed__form">
        <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-4 navbar-light">
            <a href="index.html" class="navbar-brand text-center mb-2 mr-0 flex-column" style="min-width: 0">
                <img class="navbar-brand-icon mb-3" src="assets/images/logo.svg" width="43" alt="Flat">
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
                  <strong>Error - </strong> Veuillez réessayer une autre fois
              </div>
              <?php
            }
            else
            {
              ?>
                  <div class="alert alert-success" role="alert">
                      <strong>Succès - </strong> vous avez créer un compte commercial avec succès!
                  </div>
            <?php
            }
            $_SESSION['send']="NULL";
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
              }
            }

        if(isset($_POST['submit']))
        {
            $_SESSION['enrg'] = "false";

            $inter=email_exist($_POST['email_2']);
            if($inter == "true")
            {
              $_SESSION['enrg'] = "true";
              header('Location: signup.php');
            }
            else
            {
              $default_password = default_password();
              $lien = "http://localhost/AGC/login.php";
              $txt = "Voici votre mot de passe pour se connecter à AGC : ".'<br/>'."MDP : ".$default_password.'<br/>'."Adresse email : ".$_POST['email_2'].'<br/>'." Vous pouvez utiliser le lien suivent : ".$lien;

                $req = $bdd->prepare('INSERT INTO Commerciaux (Email, Password) VALUES(?, ?)');
                $req->execute(array($_POST['email_2'], md5($default_password)));

              first_mail($_SESSION['email'], $_POST['email_2'], 'AGC',$txt);
              header('Location: signup.php');
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
            <a href="index.php"><button type="button" class="btn btn-block btn-primary">Retourner à l'accueil</button></a>
        </div>
    </div>


    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/vendor/popper.min.js"></script>
    <script src="assets/vendor/bootstrap.min.js"></script>

    <!-- Simplebar -->
    <script src="assets/vendor/simplebar.min.js"></script>

    <!-- DOM Factory -->
    <script src="assets/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="assets/vendor/material-design-kit.js"></script>

    <!-- Range Slider -->
    <script src="assets/vendor/ion.rangeSlider.min.js"></script>
    <script src="assets/js/ion-rangeslider.js"></script>

    <!-- App -->
    <script src="assets/js/toggle-check-all.js"></script>
    <script src="assets/js/check-selected-row.js"></script>
    <script src="assets/js/dropdown.js"></script>
    <script src="assets/js/sidebar-mini.js"></script>
    <script src="assets/js/app.js"></script>

    <!-- App Settings (safe to remove) -->
    <script src="assets/js/app-settings.js"></script>





</body>

</html>
