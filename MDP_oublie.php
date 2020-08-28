<?php
require 'BDD/LBD.php';
require 'functions.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Retrouvez votre mot de passe</title>

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
                <span>Retrouver votre mot de passe</span>
            </a>
        </div>
        <?php

        if(isset($_POST['submit']) && isset($_POST['email_3']) && !isset($_POST['code']) && !isset($_POST['newpassword']))
        {
            $inter=email_exist($_POST['email_3']);
            if($inter == "true")
            {
              $to = $_POST['email_3'];
              $_SESSION['email']=$_POST['email_3'];
              $subject = 'AGC';

              $otp = otp();
              $_SESSION['rand']=$otp;
              $message = "Voici votre Code de vérification : ".'<br/>'."Code : ".$otp;

              $headers = 'From: GUESSPROMO '. "\r\n" ;
              $headers .='Reply-To: '. $to . "\r\n" ;
              $headers .='X-Mailer: PHP/' . phpversion();
              $headers .= "MIME-Version: 1.0\r\n";
              $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

              if(mail($to,$subject,$message,$headers))
                $_SESSION['send']="true";
              else
                $_SESSION['send']="false";

              if(!isset($_POST['code'])) {
              ?>
              <div>
                  <p>
                  <b style="color:red"> Un mail contenant votre code de vérification est envoyé à votre adress émail </b>
                  <form action="#" method="post">
                    <input type="text" name="code" placeholder="Entrer votre code de vérification">
                    <button type="submit" class="default-btn floatright">Confirmer</button>
                  </form>
                  </p>
              </div>
            <?php
          }
      }else
          {?>
            <div class="alert alert-danger" role="alert">
                <strong>Erreur - </strong> Email non reconnu
            </div>
            <?php
          }
      }
              if((isset($_POST['code']) && $_POST['code']==$_SESSION['rand'] && !isset($_POST['newpassword'])) ||
                                        (isset($_POST['code']) && $_POST['code']==$_SESSION['rand'] && isset($_POST['newpassword']) && $_POST['newpassword']!=$_POST['passwordconf']))
              { ?>
                <div>
                <form action="#" method="post">
                    <input type="password" name="newpassword" placeholder="Entrer votre nv MDP">
                    <input type="password" name="passwordconf" placeholder="confirmer votre MDP">
                    <button type="submit" class="default-btn floatright">Enregistrer</button>
                </form>
                </div> <?php
              }elseif (isset($_POST['code']) && $_POST['code']!=$_SESSION['rand']) {
                ?>
                <b style="color:red"> Code de vérification est incorrect </b>
                <?php
              }
              if (isset($_POST['newpassword'])) {
                  if ($_POST['newpassword']==$_POST['passwordconf']) {
                      if (Update_pwd($_POST['newpassword'],$_SESSION['email'])) {
                      ?>
                      <b style="color:green"> Vous avez changé votre mot de passe avec succès </b>
                      <br/>
                      <a href="/">Login</a>
                       <?php
                     }else ?> <b style="color:red">error</b> <?php
                  }else ?> <b style="color:red"> Réessayez, Mot de passe non identique</b> <?php
              }


        if((isset($_POST['email_3']) && !email_exist($_POST['email_3'])) || (!isset($_POST['submit']) && !isset($_POST['code']) && !isset($_POST['newpassword'])))
        {
            ?>
        <div class="card card-body">

            <form action="#verification" method="POST">
                <div class="form-group">
                    <label class="text-label" for="email_3">Adresse email:</label>
                    <div class="input-group input-group-merge">
                        <input id="email_3" name="email_3" type="email" required="" class="form-control form-control-prepended" placeholder="user@exemple.com">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                  <button style="width: 276px; color: green;" name="submit" type="submit">Envoyez moi le code de vérification</button><br>
                </div>
            </form>
            <a href="/"><button type="button" class="btn btn-block btn-primary">Retourner à l'accueil</button></a>
        </div>
      <?php } ?>
    </div>


    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>


</body>

</html>
