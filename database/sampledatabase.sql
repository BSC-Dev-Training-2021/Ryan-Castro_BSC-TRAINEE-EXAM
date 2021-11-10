

CREATE TABLE `itempreorder` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `ItemName` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `TotalPrice` varchar(255) NOT NULL,
  `Images` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;






CREATE TABLE `items` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `ItemName` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Descriptions` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;


INSERT INTO items VALUES
("9","Black Tshirt","redt.jfif","T-Shirt","Matindi","150","Available","2021/11/10"),
("10","Black T-Shirt","blackt.jfif","T-Shirt","Black Yapin","150","Available","2021/11/10");




CREATE TABLE `productlist` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Descriptions` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `TotalPrice` varchar(255) NOT NULL,
  `Images` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4;


INSERT INTO productlist VALUES
("65","Black Tshirt","T-Shirt","Matindi","150","4","600","redt.jfif","2021/11/10","Ordered"),
("66","Black T-Shirt","T-Shirt","Black Yapin","150","3","450","blackt.jfif","2021/11/10","Ordered"),
("67","Black Tshirt","T-Shirt","Matindi","150","2","300","redt.jfif","2021/11/10","Ordered");




CREATE TABLE `user` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `ContactNumber` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `JoinDate` date DEFAULT NULL,
  `Membership` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `username` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;


INSERT INTO user VALUES
("1","qwe qwe","","qwe","123","","","",""),
("2","ryancastro","","ryan22","ryan25","","","",""),
("3","admin","","admin","admin","","","",""),
("6","qweqwe","qweqwe","qweqwe","qweqwe","N/A","N/A","2021-11-10","Member");


