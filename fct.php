<?php
require 'functions.php';

if( $_POST['id'])
  delet_com( $_POST['id'] );
elseif ($_POST['id1'])
  delet_projet($_POST['id1']);

?>
