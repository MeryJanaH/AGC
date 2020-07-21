
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


<?php $dn=$req->fetch(); ?>
{"data":[<?php echo $dn['Janv']. "," .$dn[2] ; ?>,20,12,7,0,8,16,18,16,10,22],"backgroundColor":"#b2e599","label":"Hanae1"},
<?php $dn=$req->fetch(); ?>
{"data":[5,10,21,12,7,10,8,16,18,16,10,22],"backgroundColor":"#b2e549","label":"Wafae2"},
{"data":[5,10,21,12,7,10,8,16,18,16,10,22],"backgroundColor":"#b205a9","label":"Walili1"},
{"data":[5,10,21,12,7,10,8,16,18,16,10,22],"backgroundColor":"#b2e59b","label":"Walili2"},
{"data":[5,10,21,12,7,10,8,16,18,16,10,22],"backgroundColor":"#b0e5c9","label":"Hanae1"},
{"data":[5,10,21,12,7,10,8,16,18,16,10,22],"backgroundColor":"#b2e509","label":"Hanae2"},
{"data":[5,10,21,12,7,10,8,16,18,16,10,22],"backgroundColor":"#a2e5d9","label":"Hanae3"}]}}'>
