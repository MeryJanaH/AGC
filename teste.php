<?php
require 'LBD.php';
require 'functions.php';
 $inter=email_exist($_POST['email_2']);
 echo $inter;

 $req = $bdd->prepare('INSERT INTO Commerciaux (CName, Password) VALUES(?, ?)');
 $req->execute(array($_POST['pseudo'], $_POST['message']));
?>
<!--
  $req = $bdd->prepare("SELECT * FROM Admin WHERE Email='meryem.annouar@ieee.org' AND Password='Mery123' ");
  $req->execute();
  $res = $req->fetch();
  print_r($res['ID_admin']);
?>-->
<!--
else {
  ?>
      <div class="alert alert-danger" role="alert">
          <strong>Error - </strong> Username Or Password Incorrect
      </div>




<body class="layout-default">
      <div class="container-fluid page__container">
          <div class="col-lg-8 card-form__body card-body">
              <div class="row">
                  <div class="col">
                      <div class="form-group">
                          <label for="fname">Nom utilisateur</label>
                          <input id="fname" type="text" class="form-control" placeholder="entrez votre nom utilisateur">
                      </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                        <label for="opass">ancien mot de passe</label>
                        <input id="opass" type="password" class="form-control" placeholder="Entrez votre ancien mot de passe">
                    </div>
                  </div>
              </div>
            </div>
      </div>

      <div class="container-fluid page__container">
          <div class="col-lg-8 card-form__body card-body">
              <div class="row">
                  <div class="col">
                    <div class="form-group">
                        <label for="npass">nouveau mot de passe</label>
                        <input style="width: 270px;" id="npass" type="password" class="form-control is-invalid">
                        <small class="invalid-feedback">Le nouveau mot de passe ne doit pas être vide.</small>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                        <label for="cpass">Confirmez le mot de passe</label>
                        <input style="width: 270px;" id="cpass" type="password" class="form-control" placeholder="Confirmez le mot de passe">
                    </div>
                  </div>
              </div>
            </div>
            <div class="text-left mb-5">
                <a href="" class="btn btn-success">Enregistrer</a>
            </div>
      </div>-->
