<?php
session_start();

function login($email,$mdp){
    require 'LBD.php';
    $req = $bdd->prepare("SELECT * FROM Admin WHERE Email=:email AND Password=:mdp ");
    $req->bindParam(':email', $email);
    $req->bindParam(':mdp', $mdp);
    if($req->execute()){
      $res = $req->fetch();
      if($res != NULL)
      {
        //enreg données
        $_SESSION['ID']=$res['ID_admin'];
        $_SESSION['name']=$res['AdminName'];
        $_SESSION['email']=$res['Email'];
        $_SESSION['user']="admin";
        return $res;
      }
      else
      {
          $req = $bdd->prepare("SELECT * FROM Commerciaux WHERE Email=:email AND Password=:mdp ");
          $req->bindParam(':email', $email);
          $req->bindParam(':mdp', $mdp);
          if( $req->execute())
          {
            $res = $req->fetch();
            if($res != NULL)
            {
              //update time of login
              $sql= $bdd->prepare("UPDATE Commerciaux SET lastLog = NOW() WHERE Email = :email AND Password= :mdp");
              $sql->bindParam(':email', $email);
              $sql->bindParam(':mdp', $mdp);
              $sql->execute();
              //enreg les données
              $_SESSION['ID']=$res['ID_cm'];
              $_SESSION['name']=$res['CName'];
              $_SESSION['email']=$res['Email'];
              $_SESSION['user']="commercial";
              return $res;
            }
            else {
              return "Utilisateur Non Enregistré";
            }
          }
      }
     }
     return "ERROR_Syntaxe";
}

function email_exist($email){
  require 'LBD.php';
  $req = $bdd->prepare("SELECT * FROM Commerciaux WHERE Email=:email");
  $req->bindParam(':email', $email);

    $req->execute();
    $res = $req->fetch();

    if($res == "")
    {
      $req = $bdd->prepare("SELECT * FROM Admin WHERE Email=:email");
      $req->bindParam(':email', $email);

        $req->execute();
        $res = $req->fetch();
    }

    if($res != "")
    {
      return "true";
    }
    else
    {
      return "false";
    }
}

function changer_parametres($name, $email, $mdp)
{
  require 'LBD.php';
  if($_SESSION['user']=="admin")
      $req = $bdd->prepare("UPDATE Admin SET AdminName=:name, Email=:email1, Password=:new_mdp  WHERE Email=:email2");
  else
      $req = $bdd->prepare("UPDATE Commerciaux SET CName=:name, Email=:email1, Password=:new_mdp  WHERE Email=:email2");

        $req->bindParam(':name', $name);
        $req->bindParam(':new_mdp',$mdp);
        $req->bindParam(':email1',$email);
        $req->bindParam(':email2',$_SESSION['email']);

    $req->execute();
}

function default_password()
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++)
    {
    $n = rand(0, $alphaLength);
    $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function first_mail($from, $to, $subj, $body)
{
    require 'mail/phpmailer/PHPMailerAutoload.php';

    $mail             = new PHPMailer();
    $mail->isSMTP(); // telling the class to use SMTP

    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->SMTPSecure = "tls";
    $mail->Host       = "smtp.gmail.com";      // SMTP server
    $mail->Port       = 587;                   // SMTP port
    $mail->Username   = 'meryem.annouar@usmba.ac.ma';  // username
    $mail->Password   = 'meryjana1999';            // password

    $mail->SetFrom($from,'GUESSPROMO');

    $mail->Subject    = $subj;
    $mail->Body       = $body;

    $mail->AddAddress($to);
    $mail->AddReplyTo($to);

    $mail->isHTML(true);
    if($mail->Send())
      $_SESSION['send']="true";
    else
      $_SESSION['send']="false";
}

function premier_login($email)
{
      require 'LBD.php';

      $req = $bdd->prepare("SELECT * FROM Commerciaux WHERE Email=:email");
      $req->bindParam(':email', $email);
      $req->execute();
      $res = $req->fetch();

      $name_exist = $res['CName'];
      if($name_exist == NULL)
      {
        return "true";
      }
      else {
        return "false";
      }
}

function register_bdd($name, $new_mdp)
{
  require 'LBD.php';

  $req = $bdd->prepare("UPDATE Commerciaux SET CName=:name,firstlog = now(), Password=:new_mdp  WHERE Email=:email");
  $req->bindParam(':name', $name);
  $req->bindParam(':new_mdp',$new_mdp);
  $req->bindParam(':email',$_SESSION['email']);

  $req->execute();
  ?>
  <?php
}

function delet_com($v_id)
{
  require 'LBD.php';
  $req = $bdd->prepare("DELETE FROM Commerciaux WHERE Commerciaux.ID_cm =:id_table");
  $req->bindParam(':id_table',$v_id);
  $req->execute();
}

function delet_projet($pj)
{
  require 'LBD.php';
  $req = $bdd->prepare("DELETE FROM Projets WHERE Projets.Code_pj =:id_projet");
  $req->bindParam(':id_projet',$pj);
  $req->execute();
}

function update_table_emp()
{
  require 'LBD.php';
  $req=$bdd->query("SELECT ID_cm, CName, firstlog, lastLog FROM Commerciaux");
  while($dn = $req->fetch())
  { ?>
    <tr>
        <td>
            <span class="js-lists-values-employee-name"><?php print_r($dn['CName']); ?></span>
        </td>
        <td><small class="text-muted"><?php print_r($dn['firstlog']) ?></small></td>
        <td><small class="text-muted"><?php print_r($dn['lastLog']) ?></small></td>
        <td><a class="text-muted"><i></i></a><?php print_r($dn['ID_cm']) ?></td>
              <script type="text/javascript">
                function showMessage<?php echo $dn['ID_cm'];?>()
                {
                    var txt;
                    if (confirm("êtes-vous sûr de supprimer <?php print_r($dn['CName']) ?> ? après cette action il ne va pas le droit d'accéder à cette application \"AGC\" ! ")) {
                        txt = "You pressed OK!";
                    } else {
                        txt = "You pressed Cancel!";
                    }
                    if(txt == "You pressed OK!")
                    {
                      $.post('fct.php', {id: <?php echo $dn['ID_cm'];?>});
                      $.ajax({
                          type: "POST",
                          url: "Commerciaux.php",
                          success: function() {
                              location.reload();
                          }
                      });
                    }
                }
              </script>

        <td>
        <input type="button" id="btnShowMsg" value="Supprimer !" onClick='showMessage<?php echo $dn['ID_cm'];?>()'/>
        </td>
    </tr>
 <?php
  }
}

function user()
{
  require 'LBD.php';

  if($_SESSION['user']=="admin")
      $req = $bdd->prepare("SELECT Password FROM Admin WHERE Email=:email");
  else
      $req = $bdd->prepare("SELECT Password FROM Commerciaux WHERE Email=:email");

      $req->bindParam(':email', $_SESSION['email']);
      $req->execute();
      $dn = $req->fetch();

      return $dn;
}

function update_table_projets()
    {
      require 'LBD.php';
      $req=$bdd->query("SELECT * FROM Projets");

      while($dn = $req->fetch())
      { ?>
        <tr>
            <td style="width: 120px";><span class="js-lists-values-employee-name"><?php print_r($dn['ProjetName']); ?></span></td>
            <td style="width: 180px";><span class="text-muted"><?php print_r($dn['type_p']) ?></span></td>
            <td style="width: 150px";><span class="text-muted"><?php print_r($dn['Etages']) ?></span></td>
            <td style="width: 150px";><span class="text-muted"><?php print_r($dn['Surface']) ?></span></td>
            <td style="width: 100px";><span class="text-muted"><?php print_r($dn['Prix']) ?></span></td>
        </tr>
     <?php
      }
    }

function update_table_clients()
    {
      require 'LBD.php';
      $req=$bdd->query("SELECT * FROM Clients");
      while($dn = $req->fetch())
      {
        $rq = $bdd->prepare("SELECT ProjetName FROM Projets WHERE Code_pj= '" . $dn['Code_pj'] . "'");
        if($rq->execute()){
        $rs = $rq->fetch();
        }
        ?>
        <tr>
           <td class="id" style="display:none;"><?php echo $dn['ID_client'] ?></td>
            <td style="width: 120px;" class="name"><?php print_r($dn['Name']); ?></td>
            <td style="width: 200px;" class="phnumber"><?php print_r($dn['phnumber']) ?></td>
            <td style="width: 150px;" class="projet_name"><?php print_r($rs['ProjetName']) ?></td>
            <span class="text-muted"><td style="width: 200px;" class="notes"><?php print_r($dn['Notes']) ?></td></span>
            <td style="width: 150px;" class="source"><?php print_r($dn['Source']) ?></td>
            <td style="width: 150px;" class="visite"><?php print_r($dn['Premier_visite']) ?></td>
            <td class="edit">
              <button type="button" class="edit-item-btn">Êdit</button>
            </td>
            <td class="remove">
               <button type="button" class="remove-item-btn">Supprimer</button>
            </td>
        </tr>
     <?php
      }
    }

    function fill_unit_select_box_projet()
    {
       require 'LBD.php';
       $output = '';
       $req=$bdd->query('SELECT *  FROM Projets');
       while($dn = $req->fetch())
       {$output .=  '<option value='.$dn['Code_pj'].'>'.$dn['ProjetName'].'</option>';}

      return $output;
    }

    function fill_unit_select_box_source()
    {
      $output = '';
       // A sample product array
       $products = array("Facebook/Instagram", "Avito/Mubawab", "Ancien_client", "Prospection", "Connaissance", "Annonce", "De_passage");

       // Iterating through the product array
       foreach($products as $item){
       $output.='<option value='.$item.'>'.$item.'</option>';
       }
       return $output;
    }

    ?>
    <script>
    function add_pj()
      {
        var html = "<tr>";
            html += "<td><input required='' id ='n' name='proj_name[]'></td>";
            html += "<td><input required='' id ='t' name='proj_type[]'></td>";
            html += "<td><input required='' id ='e' name='proj_etage[]'></td>";
            html += "<td><input required='' id ='s' name='proj_surface[]'></td>";
            html += "<td><input required='' id ='p' type='number' name='proj_prix[]'></td>";
            html += "</tr>";

       var row = document.getElementById("staff02").insertRow();
            row.innerHTML = html;
      }

      function add_ct()
        {
          var html = "<tr>";
              html += "<td><input required='' id ='n' name='name_client[]'></td>";
              html += "<td><input required='' id ='nm' type='tel' name='num[]'></td>";
              html += "<td><select required='' id = 'pj' class='form-control item_unit' name='c_p[]'><?php echo fill_unit_select_box_projet();?></select></td>";
              html += "<td><input required='' id ='nt' name='Note[]'></td>";
              html += "<td><select required='' id = 's' class='form-control item_unit' name='source[]'><?php echo fill_unit_select_box_source();?></select></td>";
              html += "</tr>";

         var row = document.getElementById("staff03").insertRow();
              row.innerHTML = html;
        }

    </script>

<?php

function  add_projet($p_n,$p_t,$p_e,$p_s,$p_p)
{
  require 'LBD.php';
  for ($a = 0; $a < count($p_n); $a++)
  {
      $req = $bdd->prepare("INSERT INTO Projets (ProjetName, type_p,Etages,Surface,Prix) VALUES ('" . $p_n[$a] . "','" . $p_t[$a]."','" . $p_e[$a]."','" . $p_s[$a]."','" . $p_p[$a]."')");
      $req->execute();
  }
}

function  add_client($c_n,$nm_t,$c_nt,$c_s,$c_p)
{
  require 'LBD.php';
  for ($a = 0; $a < count($c_n); $a++)
  {

      $req = $bdd->prepare("INSERT INTO Clients (Name, phnumber,Notes,Source,Code_pj,Premier_visite) VALUES ('" . $c_n[$a] . "','" . $nm_t[$a]."','" . $c_nt[$a]."','" . $c_s[$a]."','" . $c_p[$a]."',now())");
      $req->execute();
  }
}

function annee($year)
{
  require 'LBD.php';
  $sql="SELECT ProjetName,IFNULL(Janv,0) AS Janv,IFNULL(Fév,0) AS Fév,IFNULL(Mars,0) AS Mars,IFNULL(Avril,0) AS Avril,IFNULL(Mai,0) AS Mai,IFNULL(Juin,0) AS Juin,IFNULL(Juil,0) AS Juil,IFNULL(Août,0) AS Août,
                          IFNULL(Sep,0) AS Sep,IFNULL(Oct,0) AS Oct,
                          IFNULL(Nov,0) AS Nov,IFNULL(Déc,0) AS Déc
  FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                        LEFT JOIN
       (SELECT Code_pj, Visite,COUNT(Visite)as Janv , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='01' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t2
                        ON t1.Code_pj = t2.Code_pj
                        LEFT JOIN
        (SELECT Code_pj, Visite,COUNT(Visite)as Fév , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='02' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t3
                        ON t1.Code_pj = t3.Code_pj
                        LEFT JOIN
        (SELECT Code_pj, Visite,COUNT(Visite)as Mars , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='03' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t4
                        ON t1.Code_pj = t4.Code_pj
                        LEFT JOIN
        (SELECT Code_pj, Visite,COUNT(Visite)as Avril , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='04' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t5
                        ON t1.Code_pj = t5.Code_pj
                        LEFT JOIN
        (SELECT Code_pj, Visite,COUNT(Visite)as Mai , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='05' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t6
                        ON t1.Code_pj = t6.Code_pj
                        LEFT JOIN
        (SELECT Code_pj, Visite,COUNT(Visite)as Juin , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='06' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t7
                        ON t1.Code_pj = t7.Code_pj
                        LEFT JOIN
        (SELECT Code_pj, Visite,COUNT(Visite)as Juil , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='07' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t8
                        ON t1.Code_pj = t8.Code_pj
                        LEFT JOIN
        (SELECT Code_pj, Visite,COUNT(Visite)as Août , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='08' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t9
                        ON t1.Code_pj = t9.Code_pj
                        LEFT JOIN
        (SELECT Code_pj, Visite,COUNT(Visite)as Sep , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='09' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t10
                        ON t1.Code_pj = t10.Code_pj
                        LEFT JOIN
        (SELECT Code_pj, Visite,COUNT(Visite)as Oct , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='10' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t11
                        ON t1.Code_pj = t11.Code_pj
                        LEFT JOIN
        (SELECT Code_pj, Visite,COUNT(Visite)as Nov , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='11' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t12
                        ON t1.Code_pj = t12.Code_pj
                        LEFT JOIN
        (SELECT Code_pj, Visite,COUNT(Visite)as Déc , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='12' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t13
                        ON t1.Code_pj = t13.Code_pj";

  $req=$bdd->query($sql);
  return $req;
}

function clients_par_source($id,$year)
{
  require 'LBD.php';
   $n=0;
   if($id == "Janvier"){ $m = '01';
   $req=$bdd->query("SELECT ProjetName, count, Source FROM
                      (SELECT Code_pj, ProjetName FROM Projets) t1
                      LEFT JOIN
                      (SELECT Code_pj, Source, COUNT(Source) AS count, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='01' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY ID_client) t2
                      ON t1.Code_pj = t2.Code_pj");}
  if($id == "Fevrier"){ $m = '02';
  $req=$bdd->query("SELECT ProjetName, count, Source FROM
                     (SELECT Code_pj, ProjetName FROM Projets) t1
                     LEFT JOIN
                     (SELECT Code_pj, Source, COUNT(Source) AS count, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='02' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY ID_client) t2
                     ON t1.Code_pj = t2.Code_pj");}
 if($id == "Mars"){ $m = '03';
 $req=$bdd->query("SELECT ProjetName, count, Source FROM
                    (SELECT Code_pj, ProjetName FROM Projets) t1
                    LEFT JOIN
                    (SELECT Code_pj, Source, COUNT(Source) AS count, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='03' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY ID_client) t2
                    ON t1.Code_pj = t2.Code_pj");}
  if($id == "Avril"){ $m = '04';
  $req=$bdd->query("SELECT ProjetName, count, Source FROM
                     (SELECT Code_pj, ProjetName FROM Projets) t1
                     LEFT JOIN
                     (SELECT Code_pj, Source, COUNT(Source) AS count, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='04' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY ID_client) t2
                     ON t1.Code_pj = t2.Code_pj");}
   if($id == "Mai"){ $m = '05';
   $req=$bdd->query("SELECT ProjetName, count, Source FROM
                      (SELECT Code_pj, ProjetName FROM Projets) t1
                      LEFT JOIN
                      (SELECT Code_pj, Source, COUNT(Source) AS count, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='05' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY ID_client) t2
                      ON t1.Code_pj = t2.Code_pj");}
  if($id == "Juin"){ $m = '06';
  $req=$bdd->query("SELECT ProjetName, count, Source FROM
                     (SELECT Code_pj, ProjetName FROM Projets) t1
                     LEFT JOIN
                     (SELECT Code_pj, Source, COUNT(Source) AS count, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='06' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY ID_client) t2
                     ON t1.Code_pj = t2.Code_pj");}
   if($id == "Juillet"){ $m = '07';
   $req=$bdd->query("SELECT ProjetName, count, Source FROM
                      (SELECT Code_pj, ProjetName FROM Projets) t1
                      LEFT JOIN
                      (SELECT Code_pj, Source, COUNT(Source) AS count, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='07' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY ID_client) t2
                      ON t1.Code_pj = t2.Code_pj");}
  if($id == "Aout"){ $m = '08';
  $req=$bdd->query("SELECT ProjetName, count, Source FROM
                     (SELECT Code_pj, ProjetName FROM Projets) t1
                     LEFT JOIN
                     (SELECT Code_pj, Source, COUNT(Source) AS count, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='08' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY ID_client) t2
                     ON t1.Code_pj = t2.Code_pj");}
   if($id == "Septembre"){ $m = '09';
   $req=$bdd->query("SELECT ProjetName, count, Source FROM
                      (SELECT Code_pj, ProjetName FROM Projets) t1
                      LEFT JOIN
                      (SELECT Code_pj, Source, COUNT(Source) AS count, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='09' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY ID_client) t2
                      ON t1.Code_pj = t2.Code_pj");}
    if($id == "Octobre"){ $m = '10';
    $req=$bdd->query("SELECT ProjetName, count, Source FROM
                       (SELECT Code_pj, ProjetName FROM Projets) t1
                       LEFT JOIN
                       (SELECT Code_pj, Source, COUNT(Source) AS count, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='10' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY ID_client) t2
                       ON t1.Code_pj = t2.Code_pj");}
   if($id == "Novembre"){ $m = '11';
   $req=$bdd->query("SELECT ProjetName, count, Source FROM
                      (SELECT Code_pj, ProjetName FROM Projets) t1
                      LEFT JOIN
                      (SELECT Code_pj, Source, COUNT(Source) AS count, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='11' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY ID_client) t2
                      ON t1.Code_pj = t2.Code_pj");}
  if($id == "Decembre"){ $m = '12';
  $req=$bdd->query("SELECT ProjetName, count, Source FROM
                     (SELECT Code_pj, ProjetName FROM Projets) t1
                     LEFT JOIN
                     (SELECT Code_pj, Source, COUNT(Source) AS count, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='12' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY ID_client) t2
                     ON t1.Code_pj = t2.Code_pj");}


   while($dn = $req->fetch())
    { ?>
      <tr>
      <td class="id" style="display:none;"><?php $n+1; ?></td>
      <td class="Projets"><?php print_r($dn['ProjetName']) ?></td>
<?php if($dn['Source'] == "Facebook/Instagram"){ ?>
      <td class="Facebook"><?php print_r($dn['count']) ?></td>

<?php }else {?>
      <td class="Facebook">0</td>
<?php } if($dn['Source'] == "Avito/Mubawab"){?>
      <td class="Avito"><?php print_r($dn['count']) ?></td>
      <?php } else {?>
        <td class="Avito">0</td>
<?php }if($dn['Source'] == "Ancien_client"){?>
      <td class="Ancien"><?php print_r($dn['count']) ?></td>
      <?php } else {?>
        <td class="Ancien">0</td>
<?php }if($dn['Source'] == "Prospection"){?>
      <td class="Prospection"><?php print_r($dn['count']) ?></td>
      <?php } else {?>
        <td class="Prospection">0</td>
<?php }if($dn['Source'] == "Connaissance"){?>
      <td class="Connaissance"><?php print_r($dn['count']) ?></td>
      <?php } else {?>
        <td class="Connaissance">0</td>
<?php }if($dn['Source'] == "Annonce"){?>
      <td class="Annonce"><?php print_r($dn['count']) ?></td>
      <?php } else {?>
        <td class="Annonce">0</td>
<?php }if($dn['Source'] == "De_passage"){?>
       <td class="Passage"><?php print_r($dn['count']) ?></td>
      <?php  }else {?>
        <td class="Passage">0</td>
<?php  } ?>
      </tr>
    <?php
     }

     $req2=$bdd->query("SELECT IFNULL(facebook,0) AS facebook,IFNULL(avito,0) AS avito,IFNULL(ancien,0) AS ancien,IFNULL(prospection,0) AS prospection,IFNULL(connaissance,0) AS connaissance,IFNULL(annonce,0) AS annonce,IFNULL(passage,0) AS passage FROM
                        (SELECT Premier_visite,COUNT(Source)AS facebook FROM clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)= $m AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' AND Source='Facebook/Instagram')t1
                         JOIN
                        (SELECT Premier_visite,COUNT(Source)AS avito FROM clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)= $m AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' AND Source='Avito/Mubawab')t2
                        JOIN
                        (SELECT Premier_visite,COUNT(Source)AS ancien FROM clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)= $m AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' AND Source='Ancien_client')t3
                        JOIN
                        (SELECT Premier_visite,COUNT(Source)AS prospection FROM clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)= $m AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' AND Source='Prospection')t4
                        JOIN
                        (SELECT Premier_visite,COUNT(Source)AS connaissance FROM clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)= $m AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' AND Source='Connaissance')t5
                        JOIN
                        (SELECT Premier_visite,COUNT(Source)AS annonce FROM clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)= $m AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' AND Source='Annonce')t6
                        JOIN
                        (SELECT Premier_visite,COUNT(Source)AS passage FROM clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)= $m AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' AND Source='De_passage')t7");

      $dn2=$req2->fetch();
     ?>
        <th class="Total"><?php print_r("Total"); ?></th>
        <th class="Total"><?php print_r($dn2['facebook']); ?></th>
        <th class="Total"><?php print_r($dn2['avito']); ?></th>
        <th class="Total"><?php print_r($dn2['ancien']); ?></th>
        <th class="Total"><?php print_r($dn2['prospection']); ?></th>
        <th class="Total"><?php print_r($dn2['connaissance']); ?></th>
        <th class="Total"><?php print_r($dn2['annonce']); ?></th>
        <th class="Total"><?php print_r($dn2['passage']); ?></th>
         <?php

}

function Total_client_projets($id,$year)
{
  require 'LBD.php';
   $n=0;
   if($id == "Janvier"){ $m = '01';
   $req=$bdd->query("SELECT ProjetName,c_bureau,c_vente,c_projets  FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                      LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_bureau , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='01' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Bureau' GROUP BY Code_pj) t2
                      ON t1.Code_pj = t2.Code_pj
                      LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_vente , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='01' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Vente' GROUP BY Code_pj) t3
                      ON t1.Code_pj = t3.Code_pj
                      LEFT JOIN (SELECT Code_pj, COUNT(Source) AS c_projets, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='01' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY Code_pj) t4
                      ON t1.Code_pj = t4.Code_pj");}
  if($id == "Fevrier"){ $m = '02';
  $req=$bdd->query("SELECT ProjetName,c_bureau,c_vente,c_projets  FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                     LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_bureau , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='02' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Bureau' GROUP BY Code_pj) t2
                     ON t1.Code_pj = t2.Code_pj
                     LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_vente , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='02' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Vente' GROUP BY Code_pj) t3
                     ON t1.Code_pj = t3.Code_pj
                     LEFT JOIN (SELECT Code_pj, COUNT(Source) AS c_projets, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='02' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY Code_pj) t4
                     ON t1.Code_pj = t4.Code_pj");}
   if($id == "Mars"){ $m = '03';
   $req=$bdd->query("SELECT ProjetName,c_bureau,c_vente,c_projets  FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                      LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_bureau , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='03' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Bureau' GROUP BY Code_pj) t2
                      ON t1.Code_pj = t2.Code_pj
                      LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_vente , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='03' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Vente' GROUP BY Code_pj) t3
                      ON t1.Code_pj = t3.Code_pj
                      LEFT JOIN (SELECT Code_pj, COUNT(Source) AS c_projets, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='03' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY Code_pj) t4
                      ON t1.Code_pj = t4.Code_pj");}
  if($id == "Avril"){ $m = '04';
  $req=$bdd->query("SELECT ProjetName,c_bureau,c_vente,c_projets  FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                     LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_bureau , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='04' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Bureau' GROUP BY Code_pj) t2
                     ON t1.Code_pj = t2.Code_pj
                     LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_vente , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='04' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Vente' GROUP BY Code_pj) t3
                     ON t1.Code_pj = t3.Code_pj
                     LEFT JOIN (SELECT Code_pj, COUNT(Source) AS c_projets, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='04' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY Code_pj) t4
                     ON t1.Code_pj = t4.Code_pj");}
   if($id == "Mai"){ $m = '05';
   $req=$bdd->query("SELECT ProjetName,c_bureau,c_vente,c_projets  FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                      LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_bureau , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='05' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Bureau' GROUP BY Code_pj) t2
                      ON t1.Code_pj = t2.Code_pj
                      LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_vente , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='05' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Vente' GROUP BY Code_pj) t3
                      ON t1.Code_pj = t3.Code_pj
                      LEFT JOIN (SELECT Code_pj, COUNT(Source) AS c_projets, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='05' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY Code_pj) t4
                      ON t1.Code_pj = t4.Code_pj");}
  if($id == "Juin"){ $m = '06';
  $req=$bdd->query("SELECT ProjetName,c_bureau,c_vente,c_projets  FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                     LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_bureau , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='06' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Bureau' GROUP BY Code_pj) t2
                     ON t1.Code_pj = t2.Code_pj
                     LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_vente , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='06' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Vente' GROUP BY Code_pj) t3
                     ON t1.Code_pj = t3.Code_pj
                     LEFT JOIN (SELECT Code_pj, COUNT(Source) AS c_projets, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='06' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY Code_pj) t4
                     ON t1.Code_pj = t4.Code_pj");}
   if($id == "Juillet"){ $m = '07';
   $req=$bdd->query("SELECT ProjetName,c_bureau,c_vente,c_projets  FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                      LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_bureau , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='07' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Bureau' GROUP BY Code_pj) t2
                      ON t1.Code_pj = t2.Code_pj
                      LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_vente , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='07' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Vente' GROUP BY Code_pj) t3
                      ON t1.Code_pj = t3.Code_pj
                      LEFT JOIN (SELECT Code_pj, COUNT(Source) AS c_projets, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='07' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY Code_pj) t4
                      ON t1.Code_pj = t4.Code_pj");}
  if($id == "Aout"){ $m = '08';
  $req=$bdd->query("SELECT ProjetName,c_bureau,c_vente,c_projets  FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                     LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_bureau , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='08' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Bureau' GROUP BY Code_pj) t2
                     ON t1.Code_pj = t2.Code_pj
                     LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_vente , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='08' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Vente' GROUP BY Code_pj) t3
                     ON t1.Code_pj = t3.Code_pj
                     LEFT JOIN (SELECT Code_pj, COUNT(Source) AS c_projets, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='08' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY Code_pj) t4
                     ON t1.Code_pj = t4.Code_pj");}
   if($id == "Septembre"){ $m = '09';
   $req=$bdd->query("SELECT ProjetName,c_bureau,c_vente,c_projets  FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                      LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_bureau , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='09' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Bureau' GROUP BY Code_pj) t2
                      ON t1.Code_pj = t2.Code_pj
                      LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_vente , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='09' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Vente' GROUP BY Code_pj) t3
                      ON t1.Code_pj = t3.Code_pj
                      LEFT JOIN (SELECT Code_pj, COUNT(Source) AS c_projets, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='09' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY Code_pj) t4
                      ON t1.Code_pj = t4.Code_pj");}
  if($id == "Octobre"){ $m = '10';
  $req=$bdd->query("SELECT ProjetName,c_bureau,c_vente,c_projets  FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                     LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_bureau , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='10' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Bureau' GROUP BY Code_pj) t2
                     ON t1.Code_pj = t2.Code_pj
                     LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_vente , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='10' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Vente' GROUP BY Code_pj) t3
                     ON t1.Code_pj = t3.Code_pj
                     LEFT JOIN (SELECT Code_pj, COUNT(Source) AS c_projets, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='12' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY Code_pj) t4
                     ON t1.Code_pj = t4.Code_pj");}
   if($id == "Novembre"){ $m = '11';
   $req=$bdd->query("SELECT ProjetName,c_bureau,c_vente,c_projets  FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                      LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_bureau , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='11' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Bureau' GROUP BY Code_pj) t2
                      ON t1.Code_pj = t2.Code_pj
                      LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_vente , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='11' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Vente' GROUP BY Code_pj) t3
                      ON t1.Code_pj = t3.Code_pj
                      LEFT JOIN (SELECT Code_pj, COUNT(Source) AS c_projets, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='12' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY Code_pj) t4
                      ON t1.Code_pj = t4.Code_pj");}
  if($id == "Decembre"){ $m = '12';
  $req=$bdd->query("SELECT ProjetName,c_bureau,c_vente,c_projets  FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                     LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_bureau , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='12' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31'  AND Visite = 'Bureau' GROUP BY Code_pj) t2
                     ON t1.Code_pj = t2.Code_pj
                     LEFT JOIN (SELECT Code_pj, Visite,COUNT(Visite)as c_vente , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='12' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31'  AND Visite = 'Vente' GROUP BY Code_pj) t3
                     ON t1.Code_pj = t3.Code_pj
                     LEFT JOIN (SELECT Code_pj, COUNT(Source) AS c_projets, Premier_visite FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)='012' AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' GROUP BY Code_pj) t4
                     ON t1.Code_pj = t4.Code_pj");}


   while($dn = $req->fetch())
    { ?>
      <tr>
      <td class="id" style="display:none;"><?php $n+1; ?></td>
      <td class="Pj"><?php print_r($dn['ProjetName']) ?></td>
    <?php if(isset($dn['c_bureau'])) {?>
      <td class="bureau"><?php print_r($dn['c_bureau']) ?></td>
    <?php }  else { ?>
      <td class="bureau">0</td>
     <?php } if(isset($dn['c_projets'])){ ?>
      <td class="c_projet"><?php print_r($dn['c_projets']) ?></td>
    <?php }  else { ?>
      <td class="c_projet">0</td>
     <?php }if(isset($dn['c_vente'])){ ?>
      <td class="vente"><?php print_r($dn['c_vente']) ?></td>
    <?php } else { ?>
      <td class="vente">0</td>
    <?php } ?>
    </tr>
<?php
}

 $req2=$bdd->query("SELECT IFNULL(bureau,0) AS bureau,IFNULL(projet,0) AS projet,IFNULL(vente,0) AS vente FROM
                   (SELECT date_tdebut,COUNT(Visite)AS bureau FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)= $m AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite='Bureau')t1
                    JOIN
                   (SELECT Premier_visite,COUNT(ID_client) AS projet FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)= $m AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31')t2
                    JOIN
                   (SELECT date_tdebut,COUNT(Visite)AS vente FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)= $m AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite='Vente')t3");

 $dn2=$req2->fetch();
  ?>
    <th class="Total"><?php print_r("Total"); ?></th>
    <th class="Total"><?php print_r($dn2['bureau']); ?></th>
    <th class="Total"><?php print_r($dn2['projet']); ?></th>
    <th class="Total"><?php print_r($dn2['vente']); ?></th>
  <?php

}

?>
