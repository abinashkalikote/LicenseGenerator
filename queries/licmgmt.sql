CREATE DATABASE `licensemgmt`;

use `licensemgmt`;
CREATE TABLE `license` (
  `ID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `orgName` varchar(255) NOT NULL,
  `validUpto` text NOT NULL,
  `license` varchar(255) NOT NULL,
  `recDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
