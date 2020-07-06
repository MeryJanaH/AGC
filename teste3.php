<?php

require 'LBD.php';
session_start();

if($_SESSION['user']=="admin")
    $req = $bdd->prepare("SELECT Password FROM Admin WHERE Email=:email");
else
    $req = $bdd->prepare("SELECT Password FROM Commerciaux WHERE Email=:email");

    $req->bindParam(':email', $_SESSION['email']);
    $req->execute();
    $dn = $req->fetch();

echo $dn['Password'];
?>
