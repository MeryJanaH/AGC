<?php
require 'functions.php';
require 'LBD.php';
/*
$s1= $bdd->prepare("SELECT IFNULL(Janv,0) AS Janv
     FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                       LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Janv , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = '2020' AND MONTH(date_tdebut)='01' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t2
                       ON t1.Code_pj = t2.Code_pj");


 $s2=$bdd->prepare("SELECT IFNULL(Fév,0) AS Fév
      FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                     LEFT JOIN
     (SELECT Code_pj, Visite,COUNT(Visite)as Fév , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = '2020' AND MONTH(date_tdebut)='02' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t3
                     ON t1.Code_pj = t3.Code_pj");

 $s3=$bdd->prepare("SELECT IFNULL(Mars,0) AS Mars
      FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Mars , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = '2020' AND MONTH(date_tdebut)='03' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t4
                      ON t1.Code_pj = t4.Code_pj");

$s4=$bdd->prepare("SELECT IFNULL(Avril,0) AS Avril
     FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                     LEFT JOIN
     (SELECT Code_pj, Visite,COUNT(Visite)as Avril , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = '2020' AND MONTH(date_tdebut)='04' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t5
                     ON t1.Code_pj = t5.Code_pj");

 $s5=$bdd->prepare("SELECT IFNULL(Mai,0) AS Mai
      FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Mai , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = '2020' AND MONTH(date_tdebut)='05' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t6
                      ON t1.Code_pj = t6.Code_pj");

  $s6=$bdd->prepare("SELECT IFNULL(Juin,0) AS Juin
       FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                        LEFT JOIN
        (SELECT Code_pj, Visite,COUNT(Visite)as Juin , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = '2020' AND MONTH(date_tdebut)='06' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t7
                        ON t1.Code_pj = t7.Code_pj");


  $s7=$bdd->prepare("SELECT IFNULL(Juil,0) AS Juil
       FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                       LEFT JOIN
       (SELECT Code_pj, Visite,COUNT(Visite)as Juil , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = '2020' AND MONTH(date_tdebut)='07' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t8
                       ON t1.Code_pj = t8.Code_pj");

 $s8=$bdd->prepare("SELECT IFNULL(Août,0) AS Août
      FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Août , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = '2020' AND MONTH(date_tdebut)='08' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t9
                      ON t1.Code_pj = t9.Code_pj");

  $s9=$bdd->prepare("SELECT IFNULL(Sep,0) AS Sep
       FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                       LEFT JOIN
       (SELECT Code_pj, Visite,COUNT(Visite)as Sep , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = '2020' AND MONTH(date_tdebut)='09' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t10
                       ON t1.Code_pj = t10.Code_pj");

   $s10=$bdd->prepare("SELECT IFNULL(Oct,0) AS Oct
        FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                        LEFT JOIN
        (SELECT Code_pj, Visite,COUNT(Visite)as Oct , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = '2020' AND MONTH(date_tdebut)='10' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t11
                        ON t1.Code_pj = t11.Code_pj");

  $s11=$bdd->prepare("SELECT IFNULL(Nov,0) AS Nov
       FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                       LEFT JOIN
       (SELECT Code_pj, Visite,COUNT(Visite)as Nov , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = '2020' AND MONTH(date_tdebut)='11' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t12
                       ON t1.Code_pj = t12.Code_pj");

   $s12=$bdd->prepare("SELECT IFNULL(Déc,0) AS Déc
        FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                        LEFT JOIN
        (SELECT Code_pj, Visite,COUNT(Visite)as Déc , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = '2020' AND MONTH(date_tdebut)='12' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t13
                        ON t1.Code_pj = t13.Code_pj");

  $s1->execute();

  $s2->execute();

  $s3->execute();

  $s4->execute();

  $s5->execute();

  $s6->execute();

  $s7->execute();

  $s8->execute();

  $s9->execute();

  $s10->execute();

  $s11->execute();

  $s12->execute();

  $k= $bdd->prepare("SELECT COUNT(Code_pj) AS count_pj FROM Projets");
  $k->execute();
  $k2 = $k->fetch();

$i = 0;
for ($x = 1; $x <= $k2['count_pj']; $x++) {

$b12 = $s12->fetch();
$b11 = $s11->fetch();
$b10 = $s10->fetch();
$b9 = $s9->fetch();
$b8 = $s8->fetch();
$b7 = $s7->fetch();
$b6 = $s6->fetch();
$b5 = $s5->fetch();
$b4 = $s4->fetch();
$b3 = $s3->fetch();
$b2 = $s2->fetch();
$b1 = $s1->fetch();

$mois[$i] = array($b1, $b2, $b3, $b4, $b5, $b6, $b7, $b8, $b9, $b10, $b11, $b12);
$i++;
}
//projet , mois , val
print_r($mois[1][3][0]. "," .$mois[1][4][0]);

$req3 = $bdd->prepare("SELECT COUNT(Code_pj) AS count_pj,ProjetName FROM `Projets`");
$req3 -> execute();
$d2 = $req3->fetch();

print_r($d2['count_pj']);


$a= $bdd->prepare("SELECT ProjetName, IFNULL(count,0)AS count,date_tdebut FROM
       (SELECT Code_pj, ProjetName FROM Projets) t1
       LEFT JOIN
       (SELECT Code_pj,COUNT(Code_pj)AS count, MONTH(date_tdebut) AS date_tdebut FROM Calendrier WHERE Visite = 'Chantier' AND YEAR(date_tdebut) = '2020' GROUP BY Code_pj)t2
       ON t1.Code_pj = t2.Code_pj");
$a->execute();

$i=0;
while($b=$a->fetch()){
if($b['count']!="0"){
if($b['date_tdebut']=="1"){
  $m1[$i]=$b['count'];
  $m2[$i]=0;$m3[$i]=0;$m4[$i]=0;$m5[$i]=0;$m6[$i]=0;$m7[$i]=0;
  $m8[$i]=0;$m9[$i]=0;$m10[$i]=0;$m11[$i]=0;$m12[$i]=0;
}
if($b['date_tdebut']=="2"){
  $m1[$i]=0;
  $m2[$i]=$b['count'];
  $m3[$i]=0;$m4[$i]=0;$m5[$i]=0;$m6[$i]=0;$m7[$i]=0;
  $m8[$i]=0;$m9[$i]=0;$m10[$i]=0;$m11[$i]=0;$m12[$i]=0;
}
if($b['date_tdebut']=="3"){
  $m1[$i]=0;$m2[$i]=0;
  $m3[$i]=$b['count'];
  $m4[$i]=0;$m5[$i]=0;$m6[$i]=0;$m7[$i]=0;$m8[$i]=0;
  $m9[$i]=0;$m10[$i]=0;$m11[$i]=0;$m12[$i]=0;
}
if($b['date_tdebut']=="4"){
  $m1[$i]=0;$m2[$i]=0;$m3[$i]=0;
  $m4[$i]=$b['count'];
  $m5[$i]=0;$m6[$i]=0;$m7[$i]=0;$m8[$i]=0;
  $m9[$i]=0;$m10[$i]=0;$m11[$i]=0;$m12[$i]=0;
}
if($b['date_tdebut']=="5"){
  $m1[$i]=0;$m2[$i]=0;$m3[$i]=0;$m4[$i]=0;
  $m5[$i]=$b['count'];
  $m6[$i]=0;$m7[$i]=0;$m8[$i]=0;
  $m9[$i]=0;$m10[$i]=0;$m11[$i]=0;$m12[$i]=0;
}
if($b['date_tdebut']=="6"){
  $m1[$i]=0;$m2[$i]=0;$m3[$i]=0;$m4[$i]=0;$m5[$i]=0;
  $m6[$i]=$b['count'];
  $m7[$i]=0;$m8[$i]=0;
  $m9[$i]=0;$m10[$i]=0;$m11[$i]=0;$m12[$i]=0;
}
if($b['date_tdebut']=="7")
{
  $m1[$i]=0;$m2[$i]=0;$m3[$i]=0;$m4[$i]=0;$m5[$i]=0;$m6[$i]=0;
  $m7[$i]=$b['count'];
  $m8[$i]=0;$m9[$i]=0;$m10[$i]=0;$m11[$i]=0;$m12[$i]=0;
}
if($b['date_tdebut']=="08"){
  $m1[$i]=0;$m2[$i]=0;$m3[$i]=0;$m4[$i]=0;$m5[$i]=0;
  $m6[$i]=0;$m7[$i]=0;
  $m8[$i]=$b['count'];
  $m9[$i]=0;$m10[$i]=0;$m11[$i]=0;$m12[$i]=0;
}
if($b['date_tdebut']=="9"){
  $m1[$i]=0;$m2[$i]=0;$m3[$i]=0;$m4[$i]=0;$m5[$i]=0;
  $m6[$i]=0;$m7[$i]=0;$m8[$i]=0;
  $m9[$i]=$b['count'];
  $m10[$i]=0;$m11[$i]=0;$m12[$i]=0;
}
if($b['date_tdebut']=="10"){
  $m1[$i]=0;$m2[$i]=0;$m3[$i]=0;$m4[$i]=0;$m5[$i]=0;
  $m6[$i]=0;$m7[$i]=0;$m8[$i]=0;$m9[$i]=0;
  $m10[$i]=$b['count'];
  $m11[$i]=0;$m12[$i]=0;
}
if($b['date_tdebut']=="11"){
  $m1[$i]=0;$m2[$i]=0;$m3[$i]=0;$m4[$i]=0;$m5[$i]=0;
  $m6[$i]=0;$m7[$i]=0;$m8[$i]=0;$m9[$i]=0;$m10[$i]=0;
  $m11[$i]=$b['count'];
  $m12[$i]=0;
}
if($b['date_tdebut']=="12"){
  $m1[$i]=0;$m2[$i]=0;$m3[$i]=0;$m4[$i]=0;$m5[$i]=0;
  $m6[$i]=0;$m7[$i]=0;$m8[$i]=0;$m9[$i]=0;$m10[$i]=0;$m11[$i]=0;
  $m12[$i]=$b['count'];
}
}
else {
  $m1[$i]=0;$m2[$i]=0;$m3[$i]=0;$m4[$i]=0;$m5[$i]=0;
  $m6[$i]=0;$m7[$i]=0;$m8[$i]=0;$m9[$i]=0;$m10[$i]=0;$m11[$i]=0;$m12[$i]=0;
}
$i++;
}
//count projet
$data=[$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10,$m11,$m12];
print_r($data[6][0]) date('Y-m-d H:i:s')-

$currentDateTime = date('Y-m-d H:i:s');
echo $currentDateTime;;



$rq = $bdd->prepare(" SELECT * FROM Calendrier WHERE Category='bg-primary' ");
$rq->execute();
WHILE($dn=$rq->fetch()){
    $currentDateTime = date('Y-m-d H:i:s');
    $last = date('Y-m-d H:i:s', strtotime($dn['date_tdebut']));


$date1 = $currentDateTime;
$date2 = $last;

$diff = round(abs(strtotime($date2) - strtotime($date1))/3600,2);

echo $diff;
}


function name_client($id){
  require 'LBD.php';
  $rq = $bdd->prepare(" SELECT Name FROM Clients WHERE ID_client=$id ");
  $rq->execute();
  $req = $rq->fetch();
  return $req['Name'];
}

$rq = $bdd->prepare(" SELECT * FROM Calendrier WHERE Category='bg-primary' ORDER BY date_tdebut ASC ");
$rq->execute();
WHILE($dn=$rq->fetch()){
    $currentDateTime = date('Y-m-d H:i:s');
    $last = date('Y-m-d H:i:s', strtotime($dn['date_tdebut']));


$date1 = $currentDateTime;
$date2 = $last;

$hours = round(abs(strtotime($date2) - strtotime($date1))/3600,2);

echo $hours;
}
*/


$rq = $bdd->prepare(" SELECT * FROM Calendrier WHERE Category='bg-primary' ORDER BY date_tdebut ASC ");
$rq->execute();
$dn = $rq->fetch();

    $currentDateTime = date('Y-m-d H:i:s');
    $last = date('Y-m-d H:i:s', strtotime($dn['date_tdebut']));


$date1 = $currentDateTime;
$date2 = $last;

$hours = round((strtotime($date2) - strtotime($date1))/3600,2);
$mins = abs(((strtotime($date2) - strtotime($date1))/3600)-$hours);

echo $mins;
?>
