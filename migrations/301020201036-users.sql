CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `second_surname` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `cell_phone` varchar(10) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol_id` int(11) NOT NULL DEFAULT '2',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `users_fk` (`rol_id`),
  CONSTRAINT `users_fk` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO users (name,last_name,second_surname,address,cell_phone,birthdate,email,password,rol_id,active) VALUES 
('Administrador','Admin','Admin','S/n','0123456789',NULL,'admin@admin.com','774944bd1af7c775a06a13a45fd7f2f0fd5b36bc',1,1)
;