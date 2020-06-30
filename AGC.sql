CREATE Database if not exists AGC;
use AGC;


CREATE TABLE `Admin` (
  `ID_admin` int(10) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(50) DEFAULT NULL,
  `AccountType` varchar(30) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  
  primary key (ID_admin)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Commerciaux` (
  `ID_cm` int(10) NOT NULL AUTO_INCREMENT,
  `CName` varchar(50) DEFAULT NULL,
  `AccountType` varchar(30) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,

  primary key (ID_cm)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Projets` (
  `Code_pj` varchar(15) NOT NULL,
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

  `Code_pj` varchar(15) NOT NULL,

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
  `Code_pj` varchar(15) DEFAULT NULL,

  primary key (id),
  FOREIGN KEY (ID_client)REFERENCES Clients(ID_client),
  FOREIGN KEY (Code_pj) REFERENCES Projets(Code_pj)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;
