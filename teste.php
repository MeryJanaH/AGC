<?php

$sql="SELECT ProjetName,IFNULL(Janv,0) AS Janv,IFNULL(Fév,0) AS Fév,IFNULL(Mars,0) AS Mars,IFNULL(Avril,0) AS Avril,IFNULL(Mai,0) AS Mai,IFNULL(Juin,0) AS Juin,IFNULL(Juil,0) AS Juil,IFNULL(Août,0) AS Août,
                        IFNULL(Sep,0) AS Sep,IFNULL(Oct,0) AS Oct,
                        IFNULL(Nov,0) AS Nov,IFNULL(Déc,0) AS Déc
FROM (SELECT Code_pj, ProjetName FROM Projets) t1
                      LEFT JOIN
     (SELECT Code_pj, Visite,COUNT(Visite)as Janv , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='01' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t2
                      ON t1.Code_pj = t2.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Fév , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='02' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t3
                      ON t1.Code_pj = t3.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Mars , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='03' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t4
                      ON t1.Code_pj = t4.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Avril , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='04' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t5
                      ON t1.Code_pj = t5.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Mai , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='05' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t6
                      ON t1.Code_pj = t6.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Juin , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='06' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t7
                      ON t1.Code_pj = t7.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Juil , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='07' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t8
                      ON t1.Code_pj = t8.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Août , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='08' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t9
                      ON t1.Code_pj = t9.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Sep , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='09' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t10
                      ON t1.Code_pj = t10.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Oct , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='10' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t11
                      ON t1.Code_pj = t11.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Nov , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='11' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t12
                      ON t1.Code_pj = t12.Code_pj
                      LEFT JOIN
      (SELECT Code_pj, Visite,COUNT(Visite)as Déc , date_tdebut FROM Calendrier WHERE YEAR(date_tdebut) = $year AND MONTH(date_tdebut)='12' AND DAY(date_tdebut) >= '01' AND DAY(date_tdebut) <= '31' AND Visite = 'Chantier' GROUP BY Code_pj) t13
                      ON t1.Code_pj = t13.Code_pj";
