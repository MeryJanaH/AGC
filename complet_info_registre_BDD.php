<?php
require 'LBD.php';
require 'functions.php';

$req=$bdd->prepare("SELECT * FROM Commerciaux WHERE Email =:email");
$req->bindParam(':email', $_SESSION['email']);
$req->execute();
$dn = $req->fetch();

    if($dn['Password']==$_POST['password_1'] and $_POST['password_2']==$_POST['password_3'])
    {
      register_bdd($_POST['nom'], $_POST['password_2']);
      header('Location: index.php');
    }
    else {
      echo "no";
    }
?>
