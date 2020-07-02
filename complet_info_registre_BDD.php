<?php
require 'LBD.php';
require 'functions.php';

  register_bdd($_POST['nom'], $_POST['password_2']);
  header('Location: index.php');
?>
