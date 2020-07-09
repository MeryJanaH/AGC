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

    if($res == NULL)
    {
      $req = $bdd->prepare("SELECT * FROM Admin WHERE Email=:email");
      $req->bindParam(':email', $email);

        $req->execute();
        $res = $req->fetch();
    }

    if($res != NULL)
    {
      return true;
    }
    else
    {
      return false;
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
                    if (confirm("êtes-vous sûr de supprimer <?php print_r($dn['CName']) ?> ? après il ne va pas le droit d'accéder à cette application \"AGC\" ! ")) {
                        txt = "You pressed OK!";
                    } else {
                        txt = "You pressed Cancel!";
                    }
                    if(txt == "You pressed OK!")
                    {
                      $.post('fct.php', {id: <?php echo $dn['ID_cm'];?>});
                      $.ajax({
                          type: "POST",
                          url: "ui-tables.php",
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
            <td><span class="js-lists-values-employee-name"><?php print_r($dn['ProjetName']); ?></span></td>
            <td><span class="text-muted"><?php print_r($dn['type_p']) ?></span></td>
            <td><span class="text-muted"><?php print_r($dn['Etages']) ?></span></td>
            <td><span class="text-muted"><?php print_r($dn['Surface']) ?></span></td>
            <td><span class="text-muted"><?php print_r($dn['Prix']) ?></span></td>
        </tr>
     <?php
      }
    }
    ?>
<script>
function add_pj()
  {
    var html = "<tr>";
        html += "<td><input id ='n' name='proj_name[]'></td>";
        html += "<td><input id ='t' name='proj_type[]'></td>";
        html += "<td><input id ='e' name='proj_etage[]'></td>";
        html += "<td><input id ='s' name='proj_surface[]'></td>";
        html += "<td><input id ='p' name='proj_prix[]'></td>";
        html += "</tr>";

   var row = document.getElementById("staff02").insertRow();
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

function add_calendar()
{

}


?>
