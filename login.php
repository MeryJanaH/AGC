<?php
require 'functions.php';

if(isset($_SESSION['login'])){
    if($_SESSION['login']=="true")
    {
      header('Location: /');
    }
}

if(isset($_POST['decnx']))
{
 session_destroy();
 setcookie("Adresse_email", "", time() - 3600);
 setcookie("mot_de_passe", "", time() - 3600);
 unset($_COOKIE);
 header('Location: login');
}
else {
  if(isset($_COOKIE['Adresse_email']) and isset($_COOKIE['mot_de_passe']))
  {
    $email_p = $_COOKIE['Adresse_email'];
    $mot_p = $_COOKIE['mot_de_passe'];
    $res=login($email_p,md5($mot_p));
    if ($res=="Utilisateur Non Enregistré" or $res =="ERROR_Syntaxe") {
        $_SESSION['login']="false";
        header('Location: login');
    }
    else{
      $_SESSION['login']="true";
      header('Location: /');
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Identification</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">


    <!-- App CSS -->
    <link type="text/css" href="assets/css/app.css" rel="stylesheet">

</head>

<body class="layout-login-centered-boxed"   style="content: '';
                                            position: fixed;
                                            width: 100vw;
                                            height: 100vh;
                                            background-image: url('assets/images/back.jpg');
                                            background-position: center center;
                                            background-repeat: no-repeat;
                                            background-attachment: fixed;
                                            background-size: cover;">


    <div class="layout-login-centered-boxed__form">
        <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-2 navbar-light">
            <a href="/" class="navbar-brand text-center mb-2 mr-0" style="min-width: 0">
                <img class="navbar-brand-icon" src="assets/images/logo.png" width="43" alt="Flat">
            </a>
        </div>

        <div class="card card-body">


            <div class="page-separator">
                <div class="page-separator__text">GUESSPROMO</div>
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

            <form action="traite" method="POST">
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


</body>

</html>
