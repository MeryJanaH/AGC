<?php
require 'LBD.php';
require 'functions.php';
if(isset($_SESSION['login']) and $_SESSION['login']=="false")
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
    <title>Enregistrement</title>
    <link href="assets/images/logo.png" rel="shortcut icon" type="image/x-icon" />
    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- App CSS -->
    <link type="text/css" href="assets/css/app.css" rel="stylesheet">


</head>

<body class="layout-login-centered-boxed">

    <div class="layout-login-centered-boxed__form">
      <?php
      if($_SESSION['log_befor']=="true")
      { ?>
        <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-4 navbar-light">
            <a href="index" class="navbar-brand text-center mb-2 mr-0 flex-column" style="min-width: 0">
                <img class="navbar-brand-icon mb-3" src="assets/images/logo.png" width="43" alt="Flat">
                <span>Complétez vos informations</span>
            </a>
        </div>
        <?php
        if(isset($_POST['password_1']))
        {
          $req=$bdd->prepare("SELECT Password FROM Commerciaux WHERE Email =:email");
          $req->bindParam(':email', $_SESSION['email']);
          $req->execute();
          $dn = $req->fetch();
          if($_POST['password_2']==$_POST['password_3'])
          {
              if($dn['Password']==md5($_POST['password_1']))
              {
                register_bdd($_POST['nom'], md5($_POST['password_2']));
                header('Location: /');
              }
              else
              {
                ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Erreur - </strong> Votre ancien mot de pass est incorrect, veuillez réessayer une autre fois
                </div>
                <?php
              }
          }
          else {
            ?>
            <div class="alert alert-danger" role="alert">
                <strong>Erreur - </strong> Votre nouveau mot de passe et la confirmation ne sont pas similaires , réessayer une autre fois
            </div>
            <?php
          }
        }
      ?>
        <div class="card card-body">
            <form action="#" method="POST">
                <div class="form-group">
                  <div class="form-group">
                      <label class="text-label"  for="fname">Nom utilisateur</label>
                      <input id="fname" type="text" name="nom" class="form-control" placeholder="entrez votre nom utilisateur">
                  </div>
                    <div class="form-group">
                        <label class="text-label" for="opass">ancien mot de passe</label>
                        <input id="opass" name = "password_1" type="password" class="form-control" placeholder="Entrez votre ancien mot de passe">
                    </div>
                    <div class="form-group">
                        <label class="text-label"  for="password_2">nouveau mot de passe:</label>
                        <div class="input-group input-group-merge">
                            <input type="password" name = "password_2" id="password_2" required="" class="form-control form-control-prepended" placeholder="Entrer votre mot de passe">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-label"  for="password_3">Confirmez le mot de passe:</label>
                        <div class="input-group input-group-merge">
                            <input type="password" name = "password_3" id="password_3"  required="" class="form-control form-control-prepended" placeholder="Confirmez votre nouveau mot de passe">
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                  <button class="btn btn-primary mb-2" name="submit" type="submit">Enregistrer</button><br>
                </div>
            </form>
        </div>
      <?php
         unset($_SESSION); }
      else {
        header('Location: login');
      }?>
    </div>

    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>


</body>

</html>
