<?php
session_start();
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
                <span>Complétez vos informations</span>
            </a>
        </div>

        <div class="card card-body">
            <form action="complet_info_registre_BDD.php" method="POST">
                <div class="form-group">
                  <div class="form-group">
                      <label class="text-label"  for="fname">Nom utilisateur</label>
                      <input id="fname" type="text" name="nom" class="form-control" placeholder="entrez votre nom utilisateur">
                  </div>
                    <div class="form-group">
                        <label class="text-label" for="opass">ancien mot de passe</label>
                        <input id="opass" type="password" class="form-control" placeholder="Entrez votre ancien mot de passe">
                    </div>
                    <div class="form-group">
                        <label class="text-label"  for="password_2">nouveau mot de passe:</label>
                        <div class="input-group input-group-merge">
                            <input type="password" name = "password_2" id="password_2" required="" class="form-control form-control-prepended" placeholder="Entrer votre mot de passe">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-label"  for="password_2">Confirmez le mot de passe:</label>
                        <div class="input-group input-group-merge">
                            <input type="password" name = "password_2" id="password_2" required="" class="form-control form-control-prepended" placeholder="Confirmez votre nouveau mot de passe">
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                  <button class="btn btn-primary mb-2" name="submit" type="submit">Enregistrer</button><br>
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
