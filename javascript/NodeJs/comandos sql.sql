create database casadocodigo_nodejs;

use casadocodigo_nodejs;

CREATE TABLE `livros` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `titulo` varchar(255) DEFAULT NULL,
   `descricao` text DEFAULT NULL,
   `preco` decimal(10,2) DEFAULT NULL,
   PRIMARY KEY (`id`)
 );
 
drop table livros;
 
desc livros;

insert into livros(titulo,descricao,preco) values ('livro 5', 'quinto livro', 39.90);


select * from livros;

delete from livros where id=5;