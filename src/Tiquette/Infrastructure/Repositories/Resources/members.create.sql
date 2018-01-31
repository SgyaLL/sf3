CREATE TABLE `members` (
  `uuid` char(36) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `encoded_password` varchar(255) NOT NULL,
  `password_salt` varchar(255) NOT NULL,
  `roles` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`uuid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
