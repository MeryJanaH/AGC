<?php
session_start();
if(isset($_SESSION['login']) and $_SESSION['login']=="false" or !isset($_SESSION['login']))
{
      header('Location: login');
}
require 'LBD.php';

$req=$bdd->query("SELECT * FROM Projets");
?>
<html>
 <head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery-tabledit/jquery.tabledit.min.js"></script>
    <link href="assets/images/logo.png" rel="shortcut icon" type="image/x-icon" />
    </head>
        <body>
      <div class="container">
       <br />
       <br />
       <br />
      <div class="table-responsive">
         <h3 align="center">Apporter des modifications sur les projets (supprimer/éditer) :</h3><br />
          <table id="editable_table" class="table table-bordered table-striped">
             <thead>
              <tr>
               <th>ID</th>
               <th>Projet</th>
               <th>Type</th>
               <th>Etage</th>
               <th>Surface</th>
               <th>Prix</th>
              </tr>
             </thead>
             <tbody>
             <?php
             while($row = $req->fetch())
             {
              echo '
              <tr>
               <td>'.$row["Code_pj"].'</td>
               <td>'.$row["ProjetName"].'</td>
               <td>'.$row["type_p"].'</td>
               <td>'.$row["Etages"].'</td>
               <td>'.$row["Surface"].'</td>
               <td>'.$row["Prix"].'</td>
              </tr>
              ';
              }?>
             </tbody>
          </table>
          <input type="button" id="btnShowMsg1"  style="width: 400px; color: red;" value="Enregistrer les modifiations et retourner à la page précedente !" onClick="window.location.href='Projets';"/>
       </div>
      </div>
     </body>
</html>
<script>
$(document).ready(function(){
     $('#editable_table').Tabledit({
      url:'action',
      columns:{
      identifier:[0, "Code_pj"],
      editable:[[1, 'ProjetName'], [2, 'type_p'], [3, 'Etages'], [4, 'Surface'], [5, 'Prix']]
      },
      restoreButton:false,
      onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#'+data.Code_pj).remove();
       }
      }
     });
});
 </script>
