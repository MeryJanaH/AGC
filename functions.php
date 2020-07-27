<?php
session_start();

function login($email,$mdp){
    require 'BDD/LBD.php';
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
              if($res['Suspendre']=="1")
              {
                $_SESSION['susp']="1";
                return "Utilisateur est suspendu";
              }
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
              $_SESSION['susp']="0";
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
  require 'BDD/LBD.php';
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
  require 'BDD/LBD.php';
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

/*function first_mail($from, $to, $subj, $body)
{
    require 'mail/phpmailer/PHPMailerAutoload.php';

    $mail             = new PHPMailer();
    $mail->isSMTP(); // telling the class to use SMTP

    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->SMTPSecure = "tls";
    $mail->Host       = "smtp.gmail.com";      // SMTP server
    $mail->Port       = 587;                   // SMTP port
    $mail->Username   = 'meryem.annouar@usmba.ac.ma';  // username
    $mail->Password   = '';            // password

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
}*/

function premier_login($email)
{
      require 'BDD/LBD.php';

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
  require 'BDD/LBD.php';

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
  require 'BDD/LBD.php';
  $req = $bdd->prepare("DELETE FROM Commerciaux WHERE Commerciaux.ID_cm =:id_table");
  $req->bindParam(':id_table',$v_id);
  $req->execute();
}

function delet_projet($pj)
{
  require 'BDD/LBD.php';
  $req = $bdd->prepare("DELETE FROM Projets WHERE Projets.Code_pj =:id_projet");
  $req->bindParam(':id_projet',$pj);
  $req->execute();
}

function check_susp($id){
  require 'BDD/LBD.php';
  $req=$bdd->prepare("SELECT Suspendre FROM Commerciaux WHERE ID_cm = $id ");
  $res=$req->execute();
  $dn = $req->fetch();
  return $dn['Suspendre'];
}

function check_vend($id){
  require 'BDD/LBD.php';
  $req=$bdd->prepare("SELECT Vend FROM Projets WHERE Code_pj = $id ");
  $res=$req->execute();
  $dn = $req->fetch();
  return $dn['Vend'];
}


function update_table_emp()
{
  require 'BDD/LBD.php';
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
                      $.post('fct', {id: <?php echo $dn['ID_cm'];?>});
                      $.ajax({
                          type: "POST",
                          url: "Commerciaux",
                          success: function() {
                              location.reload();
                          }
                      });
                    }
                }

                function susp<?php echo $dn['ID_cm'];?>()
                {
                    var txt;
                    if (confirm("êtes-vous sûr de Suspendre <?php print_r($dn['CName']) ?> ? après cette action il ne va pas le droit d'accéder à cette application \"AGC\" ! ")) {
                        txt = "You pressed OK!";
                    } else {
                        txt = "You pressed Cancel!";
                    }
                    if(txt == "You pressed OK!")
                    {

                      $.post("fct",
                        {
                          op: "susp",
                          id2: <?php echo $dn['ID_cm'] ?>
                        }, function(data, status){
                       location.reload();
                     });

                    }
                }

                function delete_susp<?php echo $dn['ID_cm'];?>()
                {
                    var txt;
                    if (confirm("êtes-vous sûr d'éliminer le Suspendre de <?php print_r($dn['CName']) ?> ?! ")) {
                        txt = "You pressed OK!";
                    } else {
                        txt = "You pressed Cancel!";
                    }
                    if(txt == "You pressed OK!")
                    {

                      $.post("fct",
                        {
                          op: "no_susp",
                          id3: <?php echo $dn['ID_cm'] ?>
                        }, function(data, status){
                       location.reload();
                     });

                    }
                }
              </script>

        <td>
        <input type="button" id="btnShowMsg" value="Supprimer !" onClick='showMessage<?php echo $dn['ID_cm'];?>()'/>
        </td>

        <td>
        <input type="button" id="susp" <?php if(check_susp($dn['ID_cm'])=="1"){ ?>value="Éliminer le suspend !" onClick='delete_susp<?php echo $dn['ID_cm'];?>()' <?php }
                                              else {?> value="Suspendre !" onClick='susp<?php echo $dn['ID_cm']; ?>()' <?php } ?> />
        </td>
    </tr>
 <?php
  }
}

function user()
{
  require 'BDD/LBD.php';

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
      require 'BDD/LBD.php';
      $req=$bdd->query("SELECT * FROM Projets");

      while($dn = $req->fetch())
      { ?>
        <script>
        function pj_vendu<?php echo $dn['Code_pj'];?>()
        {
            var txt;
            if (confirm("Le projet  \"<?php print_r($dn['ProjetName']) ?>\"  est vendu ? En confirment, ce projet va pas apparaître dans les nouveaux statistiques ")) {
                txt = "You pressed OK!";
            } else {
                txt = "You pressed Cancel!";
            }
            if(txt == "You pressed OK!")
            {

              $.post("fct",
                {
                  op: "vendu",
                  id4: <?php echo $dn['Code_pj'] ?>
                }, function(data, status){
               location.reload();
             });

            }
        }

        function alert_vend(){
          alert("le projet est déjà vendu entièrement");
        }
      </script>
        <tr>
            <td style="width: 120px";><span class="js-lists-values-employee-name"><?php print_r($dn['ProjetName']); ?></span></td>
            <td style="width: 180px";><span class="text-muted"><?php print_r($dn['type_p']) ?></span></td>
            <td style="width: 150px";><span class="text-muted"><?php print_r($dn['Etages']) ?></span></td>
            <td style="width: 150px";><span class="text-muted"><?php print_r($dn['Surface']) ?></span></td>
            <td style="width: 100px";><span class="text-muted"><?php print_r($dn['Prix']) ?></span></td>
            <td>
            <input type="button" id="vend" value= <?php if(check_vend($dn['Code_pj'])=="1"){ ?> " le projet est vendu !" onClick='alert_vend()'<?php }
                                                  else {?> "Vendu ?!" onClick='pj_vendu<?php echo $dn['Code_pj'];?>()' <?php } ?> />
            </td>
        </tr>
     <?php
      }
    }

function update_table_clients()
    {
      require 'BDD/LBD.php';
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
            <td style="width: 100px"  type="number" class="nb_visite"><?php print_r($dn['nb_visite']) ?></td>
            <td style="width: 150px;" class="visite"><?php print_r($dn['Premier_visite']) ?></td>
            <td class="edit">
              <button type="button" class="edit-item-btn">Éditer</button>
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
       require 'BDD/LBD.php';
       $output = '';
       $req=$bdd->query('SELECT *  FROM Projets WHERE Vend =0');
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

function  add_projet($p_n,$p_t,$p_e,$p_s,$p_p)
{
  require 'BDD/LBD.php';
  for ($a = 0; $a < count($p_n); $a++)
  {
      $req = $bdd->prepare("INSERT INTO Projets (ProjetName, type_p,Etages,Surface,Prix) VALUES ('" . $p_n[$a] . "','" . $p_t[$a]."','" . $p_e[$a]."','" . $p_s[$a]."','" . $p_p[$a]."')");
      $req->execute();
  }
}

function  add_client($c_n,$nm_t,$c_nt,$c_s,$c_p,$c_v)
{
  require 'BDD/LBD.php';
  for ($a = 0; $a < count($c_n); $a++)
  {

      $req = $bdd->prepare("INSERT INTO Clients (Name, phnumber,Notes,Source,Code_pj,Premier_visite,nb_visite) VALUES ('" . $c_n[$a] . "','" . $nm_t[$a]."','" . $c_nt[$a]."','" . $c_s[$a]."','" . $c_p[$a]."',now()),'" . $c_v[$a]."'");
      $req->execute();
  }
}


function clients_par_source($id,$year)
{
  require 'BDD/LBD.php';
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
    { if($year < date("Y"))
      {
        $k = $bdd->prepare("SELECT Code_pj FROM Projets WHERE ProjetName ='".$dn['ProjetName']."'");
        $k->execute();
        $k = $k->fetch();
        $s = $bdd->prepare("SELECT * FROM Calendrier WHERE YEAR(date_tdebut) =$year AND Code_pj ='".$k['Code_pj']."'");
        $s->execute();
        if($s->fetch()){
                            ?>
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
      }else {
        $k = $bdd->prepare("SELECT * FROM Projets WHERE ProjetName ='".$dn['ProjetName']."'");
        $k->execute();
        $k = $k->fetch();
        $s = $bdd->prepare("SELECT * FROM Calendrier WHERE YEAR(date_tdebut) =$year AND Code_pj ='".$k['Code_pj']."'");
        $s->execute();
        if($s->fetch()){
                            ?>
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
          }else {
            if($k['Vend']!="1")
            {
                  ?>
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
          }
      }
     }

     $req2=$bdd->query("SELECT IFNULL(facebook,0) AS facebook,IFNULL(avito,0) AS avito,IFNULL(ancien,0) AS ancien,IFNULL(prospection,0) AS prospection,IFNULL(connaissance,0) AS connaissance,IFNULL(annonce,0) AS annonce,IFNULL(passage,0) AS passage FROM
                        (SELECT Premier_visite,COUNT(Source)AS facebook FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)= $m AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' AND Source='Facebook/Instagram')t1
                         JOIN
                        (SELECT Premier_visite,COUNT(Source)AS avito FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)= $m AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' AND Source='Avito/Mubawab')t2
                        JOIN
                        (SELECT Premier_visite,COUNT(Source)AS ancien FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)= $m AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' AND Source='Ancien_client')t3
                        JOIN
                        (SELECT Premier_visite,COUNT(Source)AS prospection FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)= $m AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' AND Source='Prospection')t4
                        JOIN
                        (SELECT Premier_visite,COUNT(Source)AS connaissance FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)= $m AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' AND Source='Connaissance')t5
                        JOIN
                        (SELECT Premier_visite,COUNT(Source)AS annonce FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)= $m AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' AND Source='Annonce')t6
                        JOIN
                        (SELECT Premier_visite,COUNT(Source)AS passage FROM Clients WHERE YEAR(Premier_visite) = $year AND MONTH(Premier_visite)= $m AND DAY(Premier_visite) >= '01' AND DAY(Premier_visite) <= '31' AND Source='De_passage')t7");

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
  require 'BDD/LBD.php';
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
    { if($year < date("Y"))
      {
        $k = $bdd->prepare("SELECT Code_pj FROM Projets WHERE ProjetName ='".$dn['ProjetName']."'");
        $k->execute();
        $k = $k->fetch();
        $s = $bdd->prepare("SELECT * FROM Calendrier WHERE YEAR(date_tdebut) =$year AND Code_pj ='".$k['Code_pj']."'");
        $s->execute();
        if($s->fetch()){
                ?>
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
              <?php }
            }
      }else {
              $k = $bdd->prepare("SELECT * FROM Projets WHERE ProjetName ='".$dn['ProjetName']."'");
              $k->execute();
              $k = $k->fetch();
              $s = $bdd->prepare("SELECT * FROM Calendrier WHERE YEAR(date_tdebut) =$year AND Code_pj ='".$k['Code_pj']."'");
              $s->execute();
              if($s->fetch()){?>
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
              <?php }
              }else {
                if($k['Vend']!="1")
                {?>
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
                <?php }
                }
              }
      }
    ?>
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
