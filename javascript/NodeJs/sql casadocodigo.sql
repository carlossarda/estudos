use mysql;

flush privileges;

select * from user;

update user set Select_priv = 'Y', Insert_priv = 'Y', Delete_priv = 'Y', Update_priv = 'Y', Show_view_priv = 'Y' where user='casadocodigo';

use casadocodigo;

CREATE TABLE `livros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` text,
  `preco` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
);


