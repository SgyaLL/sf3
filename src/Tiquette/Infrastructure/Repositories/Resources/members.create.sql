CREATE TABLE `members` (
  `email` varchar(255) NOT NULL,
  `nickname`  varchar(255) NOT NULL,
  `encoded_password`  varchar(255) NOT NULL,
  `password_salt` varchar(255) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
