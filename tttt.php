
<?php
require 'functions.php';

if(isset($_POST["name_client"]))
{
    echo "hii2";
    if (isset($_POST["add"]))
    {
        echo "hii";
    }
}
else {
 header('Location: Clients.php');
}
