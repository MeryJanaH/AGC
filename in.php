<?php
require 'LBD.php';

if(isset($_GET['data'])){
$req=$bdd->query("SELECT * FROM Clients");
}
else{
$req=$bdd->query("SELECT * FROM Projets");
}
?>
<html>
 <head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery-tabledit/jquery.tabledit.min.js"></script>

    </head>
        <body>
      <div class="container">
       <br />
       <br />
       <br />
      <div class="table-responsive">
    <?php if(isset($_GET['data'])){?>
        <h3 align="center">Apporter des modifications sur les clients (supprimer/éditer) :</h3><br />
        <table id="editable_table" class="table table-bordered table-striped">
           <thead>
            <tr>
             <th>Nom</th>
             <th>Numéro de téléphone</th>
             <th>Notes</th>
             <th>Source</th>
             <th>Projet</th>
            </tr>
           </thead>
           <tbody>
           <?php
           while($row = $req->fetch())
           {
            echo '
            <tr>
             <td>'.$row["Name"].'</td>
             <td>'.$row["phnumber"].'</td>
             <td>'.$row["Notes"].'</td>
             <td>'.$row["Source"].'</td>
             <td>'.$row["Code_pj"].'</td>
            </tr>
            ';
           }
          } else {?>
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
             }
           }?>
             </tbody>
          </table>
        <?php if(isset($_GET['data'])){?>
        <input type="button" id="btnShowMsg1"  style="width: 400px; color: red;" value="Enregistrer les modifiations et retourner à la page précedente !" onClick="window.location.href='table_clients.php';"/>
        <?php } else { ?>
          <input type="button" id="btnShowMsg1"  style="width: 400px; color: red;" value="Enregistrer les modifiations et retourner à la page précedente !" onClick="window.location.href='ui-projets.php';"/>
        <?php } ?>
       </div>
      </div>
     </body>
</html>
<script>
$(document).ready(function(){
     $('#editable_table').Tabledit({
      <?php if(isset($_GET['data'])){?>
      url:'action.php?data=clients',
      columns:{
      identifier:[0, "ID_client"],
      editable:[[1, 'Name'], [2, 'phnumber'], [3, 'Notes'], [4, 'Source'], [5, 'Code_pj']]
      },
      restoreButton:false,
      onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#'+data.ID_client).remove();
       }
      }
      <?php } else {?>
      url:'action.php',
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
    <?php } ?>
     });
});
 </script>
