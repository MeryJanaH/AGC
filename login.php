<?php
session_start();
if(isset($_SESSION['login'])){
    if($_SESSION['login']=="true")
    {
      header('Location: index.php');
    }
}

if(isset($_COOKIE['Adresse_email']) and isset($_COOKIE['mot_de_passe']))
{
  $email_p = $_COOKIE['Adresse_email'];
  $mot_p = $_COOKIE['mot_de_passe'];
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
        <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-2 navbar-light">
            <a href="index.php" class="navbar-brand text-center mb-2 mr-0" style="min-width: 0">
                <img class="navbar-brand-icon" src="assets/images/logo.svg" width="43" alt="Flat">
            </a>
        </div>

        <div class="card card-body">


            <div class="page-separator">
                <div class="page-separator__text">Bonjour</div>
            </div>
                <?php
                if(isset($_SESSION['login']))
                {
                    if($_SESSION['login']=="false")
                    {
                      ?>
                      <div class="alert alert-danger" role="alert">
                          <strong>Erreur - </strong> Adresse email ou le mot de passe est incorrect
                      </div>
                      <?php
                      unset($_SESSION);
                    }
                }
                ?>

            <form action="traite.php" method="POST">
                <div class="form-group">
                    <label class="text-label" for="email_2">Adresse email:</label>
                    <div class="input-group input-group-merge">
                        <input  type="email" name="email_2" value="<?php if(isset($email_p)){echo $email_p;} else echo ""; ?>" id="email_2" required="" class="form-control form-control-prepended" placeholder="user@exemple.com">
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label"  for="password_2">mot de passe:</label>
                    <div class="input-group input-group-merge">
                        <input type="password" name = "password_2" value="<?php if(isset($mot_p)){echo $mot_p;} else echo ""; ?>" id="password_2" required="" class="form-control form-control-prepended" placeholder="Entrer votre mot de passe">
                    </div>
                </div>
                <?php
                    if(!isset($email_p) and !isset($mot_p))
                    {
                 ?>
                    <div class="form-group text-center">
                       <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input" name="remember" id="remember">
                           <label class="custom-control-label"  for="remember">souvenez de moi pendant 7 jours</label>
                       </div>
                   </div>
                 <?php
                    }
                  ?>
                <div class="form-group">
                    <button class="btn btn-block btn-primary" type="submit">S'identifier</button>
                </div>
            </form>

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
