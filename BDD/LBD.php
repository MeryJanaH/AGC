<?php
  // Connexion à la base de données
  try
  {
          $bdd = new PDO('mysql:host=localhost;dbname=sc2bomo9230_AGC', 'sc2bomo9230_admin', '[AGCguesspromoMA]');
  }
  catch(Exception $e)
  {
          die('Erreur : '.$e->getMessage());
  }
?>
