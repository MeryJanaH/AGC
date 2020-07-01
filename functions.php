<?php

function login($email,$mdp){
    require 'LBD.php';
    $req = $bdd->prepare("SELECT * FROM Admin WHERE Email=:email AND Password=:mdp ");
    $req->bindParam(':email', $email);
    $req->bindParam(':mdp', $mdp);
    if($req->execute()){
      $res = $req->fetch();
      if($res != NULL)
      {
      $array = array(
        "admin" => true,
        "commercial" => false,
        "res" => $res
        );
        $_SESSION['ID']=$res['ID_admin'];
        $_SESSION['name']=$res['AdminName'];
        $_SESSION['email']=$res['Email'];
        return $array;
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
              $array = array(
              "admin" => false,
              "commercial" => true,
              "res" => $res
              );
              $_SESSION['ID']=$res['ID_admin'];
              $_SESSION['name']=$res['AdminName'];
              $_SESSION['email']=$res['Email'];
              return $array;
            }
            else {
              return "Utilisateur Non Enregistré";
            }
          }
      }
     }
     return "ERROR_Syntaxe";
}
?>
