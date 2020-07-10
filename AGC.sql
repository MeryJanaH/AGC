CREATE Database if not exists AGC;
use AGC;


CREATE TABLE `Admin` (
  `ID_admin` int(10) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(80) DEFAULT NULL,

  primary key (ID_admin)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Commerciaux` (
  `ID_cm` int(10) NOT NULL AUTO_INCREMENT,
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
  `ID_client` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) DEFAULT NULL,
  `phnumber` bigint(10) DEFAULT NULL,
  `Notes` mediumtext DEFAULT NULL,
  `Source` varchar(50) DEFAULT NULL,
  `Code_pj` int(15) NOT NULL,

  primary key (ID_client),
  FOREIGN KEY (Code_pj) REFERENCES Projets(Code_pj)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `Calendrier` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `jour` date NOT NULL,
  `J_time` time(0) NOT NULL,
  `Event` varchar(30) DEFAULT NULL,
  `Description` varchar(80) DEFAULT NULL,
  `ID_client` int(10) DEFAULT NULL,
  `Code_pj` int(15) DEFAULT NULL,

  primary key (id),
  FOREIGN KEY (ID_client)REFERENCES Clients(ID_client),
  FOREIGN KEY (Code_pj) REFERENCES Projets(Code_pj)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into Admin (ID_admin,AdminName,Email,Password) values(3,"Annouar","meryem.annouar@ieee.org","202cb962ac59075b964b07152d234b70");
insert into Commerciaux (ID_cm,CName,Email,Password) values(5,"Yassine","Yassine.Oukassou@ieee.org","202cb962ac59075b964b07152d234b70");
