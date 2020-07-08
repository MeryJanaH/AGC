<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php

require 'functions.php';
require 'LBD.php';

if(isset($_SESSION['name']))
{
include 'head.php';?>

<body class="layout-default">

    <div class="preloader"></div>

    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px" data-fullbleed>
        <div class="mdk-drawer-layout__content">

            <!-- Header Layout -->
            <div class="mdk-header-layout js-mdk-header-layout" data-has-scrolling-region>

            <?php include('haute_bar.php'); ?>

                <!-- Header Layout Content -->
          <form action="#modif" method="POST">
                <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page">
                    <div class="container-fluid page__container">
                        <div class="card card-form">
                            <div class="row no-gutters">
                                <div class="col-lg-4 card-body">
                                    <p><strong class="headings-color">Informations de base</strong></p>
                                    <p class="text-muted">Modifier les paramètres de votre compte;</p>
                                </div>
                                <div class="col-lg-8 card-form__body card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="fname">Nom utilisateur</label>
                                                <input id="fname" name="user_name" required="" type="text" class="form-control" placeholder="First name" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-label" for="email">Adresse email:</label>
                                        <div class="input-group input-group-merge">
                                            <input  type="email" name="email_r" value="" required="" id="email_r" required="" class="form-control form-control-prepended" placeholder="user@exemple.com">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-form">
                            <div class="row no-gutters">
                                <div class="col-lg-4 card-body">
                                    <p><strong class="headings-color">Mettez à jour votre mot de passe</strong></p>
                                    <p class="text-muted">Changez votre mot de passe: Renseigner les trois champs attentivement;</p>
                                </div>
                                <div class="col-lg-8 card-form__body card-body">
                                    <div class="form-group">
                                        <label for="opass">Ancien mot de passe</label>
                                        <input style="width: 270px;" id="opass" required="" name="mdp_1" type="password" class="form-control" placeholder="Old password" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="npass">nouveau mot de passe</label>
                                        <input style="width: 270px;" id="npass" required="" name ="mdp_2" type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="cpass">Confirmez le mot de passe</label>
                                        <input style="width: 270px;" id="cpass" required="" name="mdp_3" type="password" class="form-control" placeholder="Confirm password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-5">
                            <button class="btn btn-success" type="submit">Enregistrer les modifications</button>
                        </div>
                </form>

                <!-- aporter des modif sur les info personnels, s'il est empty, pas de modif, sinon update -->

                <?php
                  if(isset($_POST['mdp_1']))
                  {
                    //password d'utilisateur
                      $dn = user();
                      
                  if($dn['Password'] == $_POST['mdp_1'])
                      {
                        if($_POST['mdp_2'] == $_POST['mdp_3'])
                        {
                           $nv_mdp = $_POST['mdp_2'];
                          if($_POST['user_name'])
                          {
                            $name = $_POST['user_name'];
                            if($_POST['email_r'])
                            {
                              $email = $_POST['email_r'];
                              //enreg bdd
                              changer_parametres($name, $email, $nv_mdp);
                              //le changement est fait
                              ?>
                              <script>
                                alert("Vous avez modifier vos informations avec succès");
                              </script>
                              <?php
                            }
                        }
                      }
                      else
                      {
                        // mdp pas les meme
                        ?>
                        <script>
                          alert("Les modification ne sont pas faites : vous avez pas modifier votre mot de passe correctement");
                        </script>
                        <?php
                      }
                    }
                    else
                    {
                      // ps de chang : mdp incorrect
                      ?>
                      <script>
                        alert("Les modification ne sont pas faites : Votre ancien mot de passe est incorrecte");
                      </script>
                      <?php
                    }
                  }
                 ?>

                    </div>
                </div>
                <!-- // END header-layout__content -->

            </div>
            <!-- // END header-layout -->

        </div>
        <!-- // END drawer-layout__content -->
    <?php
    }
    else
    {
      unset($_SESSION);
      header('Location: login.php');
    }
    ?>
<?php include 'footer.php';?>
</body>
</html>
