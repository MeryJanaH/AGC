<?php '2020'="2020";
require 'LBD.php';

$req2=$bdd->query("SELECT Source, COUNT(Source) AS count FROM Clients GROUP BY Source");
$dn2=$req2->fetch();
echo $dn2['Source'];
$dn2=$req2->fetch();
echo $dn2['Source'];
$dn2=$req2->fetch();
echo $dn2['Source'];
