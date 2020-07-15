CREATE Database if not exists AGC;
use AGC;


CREATE TABLE `Admin` (
  `ID_admin` int(15) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(80) DEFAULT NULL,

  primary key (ID_admin)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Commerciaux` (
  `ID_cm` int(15) NOT NULL AUTO_INCREMENT,
  `CName` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(80) DEFAULT NULL,
  `firstlog` timestamp NULL DEFAULT current_timestamp(),
  `lastLog` timestamp NULL DEFAULT current_timestamp(),

  primary key (ID_cm)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Projets` (
  `Code_pj` int(15) NOT NULL AUTO_INCREMENT,
  `ProjetName` varchar(30) DEFAULT NULL,
  `type_p` varchar(30) DEFAULT NULL,
  `Etages` varchar(30) DEFAULT NULL,
  `Surface` varchar(80) DEFAULT NULL,
  `Prix` int(80) DEFAULT NULL,

  primary key (Code_pj)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Clients` (
  `ID_client` int(15) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) DEFAULT NULL,
  `phnumber` varchar(15) DEFAULT NULL,
  `Notes` mediumtext DEFAULT NULL,
  `Premier_visite` timestamp NULL DEFAULT current_timestamp(),
  `Source` varchar(50) DEFAULT NULL,
  `Code_pj` int(15) NOT NULL,

  primary key (ID_client),
  FOREIGN KEY (Code_pj) REFERENCES Projets(Code_pj)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `Calendrier` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `date_tdebut` varchar(50) DEFAULT NULL,
  `date_tfin` varchar(50) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Visite` varchar(20) DEFAULT NULL,
  `Category` varchar(20) DEFAULT NULL,
  `ID_client` int(15) DEFAULT NULL,
  `ID_cm` int(15) NOT NULL ,
  `Code_pj` int(15) NOT NULL,

  primary key (id),
  FOREIGN KEY (ID_client)REFERENCES Clients(ID_client),
  FOREIGN KEY (Code_pj) REFERENCES Projets(Code_pj),
  FOREIGN KEY (ID_cm) REFERENCES Commerciaux(ID_cm)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO Admin (AdminName,Email,Password) VALUES("Annouar","meryem.annouar@ieee.org","202cb962ac59075b964b07152d234b70");
INSERT INTO Commerciaux (CName,Email,Password) VALUES("Yassine","Yassine.Oukassou@ieee.org","202cb962ac59075b964b07152d234b70");



INSERT INTO `Projets`(`ProjetName`, `type_p`, `Etages`, `Surface`, `Prix`) VALUES ("Hanae 1","Moyen standing","R+2","145 / 186",145542);
INSERT INTO `Projets`(`ProjetName`, `type_p`, `Etages`, `Surface`, `Prix`) VALUES ("Hanae 2","Moyen standing","R+2","158",1456522);
INSERT INTO `Projets`(`ProjetName`, `type_p`, `Etages`, `Surface`, `Prix`) VALUES ("Hanae 3","Moyen standing","R+2","148",145652);
INSERT INTO `Projets`(`ProjetName`, `type_p`, `Etages`, `Surface`, `Prix`) VALUES ("Walili 1","Haut standing plus","R+3","148",1478452);
INSERT INTO `Projets`(`ProjetName`, `type_p`, `Etages`, `Surface`, `Prix`) VALUES ("Walili 2","Haut standing plus","R+3","158",145452);
INSERT INTO `Projets`(`ProjetName`, `type_p`, `Etages`, `Surface`, `Prix`) VALUES ("Wafae 1","Moyen standing plus","R+4","148",1455422);
INSERT INTO `Projets`(`ProjetName`, `type_p`, `Etages`, `Surface`, `Prix`) VALUES ("Wafae 2","Moyen standing plus","R+4","148",1366452);



INSERT INTO `Clients`(`Name`, `phnumber`, `Notes`, `Source`, `Code_pj`) VALUES ("Mme Zoubida","0698878325","A14 67 m² 3ème étage","Connaissance",7);
INSERT INTO `Clients`(`Name`, `phnumber`, `Notes`, `Source`, `Code_pj`) VALUES ("M. Youssef ","0661361570","duplex 201 m²","De passage",5);
INSERT INTO `Clients`(`Name`, `phnumber`, `Notes`, `Source`, `Code_pj`) VALUES ("Mme badraoui","0665084531","app 107 m² 1er étage","De passage",5);
INSERT INTO `Clients`(`Name`, `phnumber`, `Notes`, `Source`, `Code_pj`) VALUES ("M. Yassine","+971554090091","App / Va venir au Maroc le mois 1","Annonce",7);
INSERT INTO `Clients`(`Name`, `phnumber`, `Notes`, `Source`, `Code_pj`) VALUES ("M. Said","+32488082069","App / Va venir au Maroc Après le confinement","Annonce",5);
INSERT INTO `Clients`(`Name`, `phnumber`, `Notes`, `Source`, `Code_pj`) VALUES ("M. Hamza","0707185896","App","Annonce",5);
INSERT INTO `Clients`(`Name`, `phnumber`, `Notes`, `Source`, `Code_pj`) VALUES ("M. Brahim","066930354","App / ََA1+A3","De passage",5);
