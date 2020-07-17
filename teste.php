<?php

SELECT ProjetName,Visite, COUNT(Visite) FROM

(SELECT Code_pj, ProjetName FROM Projets) t1
LEFT JOIN
(SELECT Code_pj, Visite,COUNT(Visite) , date_tdebut FROM Calendrier WHERE date_tdebut >= '2020-07-01 00:00:00' AND date_tdebut < '2020-08-01 00:00:00' GROUP BY Visite) t2
ON t1.Code_pj = t2.Code_pj


SELECT ProjetName, Visite, COUNT(Visite) FROM
                      (SELECT Code_pj, ProjetName FROM Projets) t1
                      LEFT JOIN


<?php
require 'LBD.php';
 $n=0;
 $req2=$bdd->query("SELECT ProjetName, count, Source FROM
                    (SELECT Code_pj, ProjetName FROM Projets) t1
                    LEFT JOIN
                    (SELECT Code_pj, Source, COUNT(Source) AS count, Premier_visite FROM Clients WHERE Premier_visite >= '2020-07-01 00:00:00' AND Premier_visite < '2020-08-01 00:00:00' GROUP BY Source) t2
                    ON t1.Code_pj = t2.Code_pj"); ?>

<?php  while($dn2 = $req2->fetch())
  {?>
  <tr><td><?php print_r($dn2['count']) ?></td></tr>
<?php if(!isset($dn2['count'])){ ?><tr><td> class="Total">0</td></tr><?php }}?>


      require 'LBD.php';
$req=$bdd->query("SELECT * FROM Clients ");
  $res = $req->fetch();

  echo "2020-08-01 00:00:00" > $res[Premier_visite];
/*function fill_unit_select_box_source()
{
  $output = '';
   // A sample product array
   $products = array("Mobile", "Laptop", "Tablet", "Camera");

   // Iterating through the product array
   foreach($products as $item){
   $output.='<option value='.strtolower($item).'>'.$item.'</option>';
   }
   return $output;
}

echo fill_unit_select_box_source();*/
/*
require 'LBD.php';

$req = $bdd->prepare("SELECT * FROM Admin WHERE Email='meryem.annouar@ieee.org'");

  $req->execute();
  $res = $req->fetch();

print_r($res);*/
/*$input = filter_input_array(INPUT_POST);

  $Nom = $input["Name"];
  $num = $input["phnumber"];
  $Notes = $input["Notes"];
  $Source = $input["Source"];
  $Projet = $input["Code_pj"];
  $id= $input["ID_client"];


?>
<script> alert("mery"); </script>


<?php
*/



//print_r($_POST['projet']);
/*require 'LBD.php';
$re = $bdd->prepare("SELECT Code_pj FROM Projets WHERE ProjetName ='hi'");
$re->execute();
$res = $re->fetch();
print_r($res['0']);*/
 //$inter=email_exist($_POST['email_2']);
 //echo $inter;
/*function  fill_unit_select_box(){
  require 'LBD.php';
    $output = '';
    $req=$bdd->query('SELECT *  FROM Projets');
    while($dn = $req->fetch())
    {$output .=  '<option value="'.$dn['Code_pj'].'">'.$dn['ProjetName'].'</option>';}

    return $output;}

echo fill_unit_select_box();*/


  //$sql="UPDATE Commerciaux SET lastLog = NOW() WHERE Email = 'Yassine.Oukassou@ieee.org' AND Password= 'oks123';

 /*<!--$req=$bdd->querCName FROM Commerciaux");
 while(>!--$dn = $req->fetch())
 <td><small class="text-muted">3 days ago</small></td>
       <td><a class="text-muted"><i></i></a></td>
   </tr>
<?php

<!--
else {
  ?>
      <div class="alert alert-danger" role="alert">
          <strong>Error - </strong> Username Or Password Incorrect
      </div>

      <tr>
          <td>
              <span class="js-lists-values-employee-name">Michael Smith</span>
          </td>
          <td><span class="badge badge-warning">ADMIN</span></td>
          <td><small class="text-muted">3 days ago</small></td>
      </tr>

      <tr>
          <td>
              <span class="js-lists-values-employee-name">Connie Smith</span>
          </td>
          <td><span class="badge badge-success">USER</span></td>
          <td><small class="text-muted">1 week ago</small></td>
      </tr>

      <tr>
          <td>
              <span class="js-lists-values-employee-name">Michael Smith</span>
          </td>
          <td><span class="badge badge-warning">ADMIN</span></td>
          <td><small class="text-muted">3 days ago</small></td>
          <td><a class="text-muted"><i></i></a></td>
      </tr>


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
