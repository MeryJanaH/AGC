<?php

if(isset($_POST['passw2']))
{
   if($_POST['passw2'] == $_POST['passw3'])
   {
     echo '<p style = "color:green"> mots de passe similaires';
   }
   else
   {
     echo '<p style = "color:red"> mots de passe ne sont pas similaires';
   }
}

 ?>
