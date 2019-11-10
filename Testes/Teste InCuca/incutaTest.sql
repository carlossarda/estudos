create database incucaTest;

use incucaTest;

create table vendedor (
id_vendedor int(4) not null auto_increment primary key,
nome varchar(255) not null,
cidade varchar(255),
comissao float(3,2)
) AUTO_INCREMENT=5000;

create table cliente (
id_cliente int(4) not null auto_increment primary key,
nome_cliente varchar(255) not null,
cidade varchar(255),
gasto float(6,2),
id_vendedor int(4),
foreign key (id_vendedor) references vendedor(id_vendedor)
) AUTO_INCREMENT=4000;

create table pedido (
id_pedido int(5) not null auto_increment primary key,
qtd_comprada float(6,2) not null,
data_pedido date,
id_cliente int(4),
id_vendedor int(4),
foreign key (id_cliente) references cliente(id_cliente),
foreign key (id_vendedor) references vendedor(id_vendedor)
) AUTO_INCREMENT=70000;



insert into vendedor (id_vendedor, nome, cidade, comissao) values (5001,'James Hoog', 'New York', 0.15);
insert into vendedor (id_vendedor, nome, cidade, comissao) values (5002,'Nail Knite', 'Paris', 0.13);
insert into vendedor (id_vendedor, nome, cidade, comissao) values (5005,'Pit Alex', 'London', 0.11);
insert into vendedor (id_vendedor, nome, cidade, comissao) values (5006,'Mc Lyon', 'Paris', 0.14);
insert into vendedor (id_vendedor, nome, cidade, comissao) values (5003,'Lauson Hen', '' , 0.12);
insert into vendedor (id_vendedor, nome, cidade, comissao) values (5007,'Paul Adam', 'Rome', 0.13);


insert into cliente (id_cliente, nome_cliente, cidade, gasto, id_vendedor) values (4002, 'Nick Rimando',  'New York', 100, 5001);
insert into cliente (id_cliente, nome_cliente, cidade, gasto, id_vendedor) values (4005, 'Graham Zusi',  'California', 200, 5002);
insert into cliente (id_cliente, nome_cliente, cidade, gasto, id_vendedor) values (4001, 'Brad Guzan',  'London', null, 5005);
insert into cliente (id_cliente, nome_cliente, cidade, gasto, id_vendedor) values (4004, 'Fabian Johns',  'Paris', 300, 5006);
insert into cliente (id_cliente, nome_cliente, cidade, gasto, id_vendedor) values (4007, 'Brad Davis',  'New York', 200, 5001);
insert into cliente (id_cliente, nome_cliente, cidade, gasto, id_vendedor) values (4009, 'Geoff Camero',  'Berlin', 100, 5003);
insert into cliente (id_cliente, nome_cliente, cidade, gasto, id_vendedor) values (4008, 'Julian Green',  'London', 300, 5002);
insert into cliente (id_cliente, nome_cliente, cidade, gasto, id_vendedor) values (4003, 'Jozy Altidor',  'Moscow', 200, 5007);

insert into pedido (id_pedido, qtd_comprada, data_pedido, id_cliente, id_vendedor) values (70001, 150.5, '2018-10-05', 4005, 5002);
insert into pedido (id_pedido, qtd_comprada, data_pedido, id_cliente, id_vendedor) values (70009, 270.65, '2018-09-10', 4001, 5005);
insert into pedido (id_pedido, qtd_comprada, data_pedido, id_cliente, id_vendedor) values (70002, 65.26, '2018-10-05', 4002, 5001);
insert into pedido (id_pedido, qtd_comprada, data_pedido, id_cliente, id_vendedor) values (70004, 110.5, '2018-08-17', 4009, 5003);
insert into pedido (id_pedido, qtd_comprada, data_pedido, id_cliente, id_vendedor) values (70007, 948.5, '2018-09-10', 4005, 5002);
insert into pedido (id_pedido, qtd_comprada, data_pedido, id_cliente, id_vendedor) values (70005, 2400.6, '2018-07-27', 4007, 5001);
insert into pedido (id_pedido, qtd_comprada, data_pedido, id_cliente, id_vendedor) values (70008, 5760, '2018-09-10', 4002, 5001);
insert into pedido (id_pedido, qtd_comprada, data_pedido, id_cliente, id_vendedor) values (70010, 1983.43, '2018-10-10', 4004, 5006);
insert into pedido (id_pedido, qtd_comprada, data_pedido, id_cliente, id_vendedor) values (70003, 2480.4, '2018-10-10', 4009, 5003);
insert into pedido (id_pedido, qtd_comprada, data_pedido, id_cliente, id_vendedor) values (70012, 250.45, '2018-06-27', 4008, 5002);
insert into pedido (id_pedido, qtd_comprada, data_pedido, id_cliente, id_vendedor) values (70011, 75.29, '2018-08-17', 4003, 5007);
insert into pedido (id_pedido, qtd_comprada, data_pedido, id_cliente, id_vendedor) values (70013, 3045.6, '2018-04-25', 4002, 5001);

select * from pedido;


/*Exercicio 1*/

SELECT p.id_pedido, p.data_pedido, p.qtd_comprada, c.nome_cliente, c.cidade, c.gasto
FROM ((pedido AS p
    INNER JOIN cliente AS c ON p.id_cliente = c.id_cliente)
    INNER JOIN vendedor AS v ON p.id_vendedor = v.id_vendedor)
WHERE v.comissao > 0.12;

/*Exercicio 2*/;

select* from cliente;

select c.id_cliente, ucase(c.nome_cliente) as nome_cliente, ucase(c.cidade) as cidade, c.gasto, ucase(v.nome) as nome, ucase(v.cidade) as cidade
from (cliente as c
inner join vendedor as v on v.id_vendedor = c.id_vendedor);


/*Exercicio 3*/

select c.*, v.nome, v.comissao
from cliente as c
inner join vendedor as v on c.id_vendedor = v.id_vendedor
where v.comissao = (
	select max(v.comissao)
	from vendedor as v
);


/*Exercicio 4*/

select v.cidade from vendedor as v group by v.cidade;

select c.cidade from cliente as c group by c.cidade;


create table cidade (
id_cidade int not null auto_increment primary key,
nome varchar(255) not null
);

insert into cidade (nome) values ('London');
insert into cidade (nome) values ('New York');
insert into cidade (nome) values ('Paris');
insert into cidade (nome) values ('Rome');
insert into cidade (nome) values ('Moscow');
insert into cidade (nome) values ('California');
insert into cidade (nome) values ('Berlin');
insert into cidade (id_cidade,nome) values (0,'Vazia');

update cliente set cidade = 1 where cidade = 'London';
update vendedor set cidade = 1 where cidade = 'London';

update cliente set cidade = 2 where cidade = 'New York';
update vendedor set cidade = 2 where cidade = 'New York';

update cliente set cidade = 3 where cidade = 'Paris';
update vendedor set cidade = 3 where cidade = 'Paris';

update cliente set cidade = 4 where cidade = 'Rome';
update vendedor set cidade = 4 where cidade = 'Rome';

update cliente set cidade = 5 where cidade = 'Moscow';
update vendedor set cidade = 5 where cidade = 'Moscow';

update cliente set cidade = 6 where cidade = 'California';
update vendedor set cidade = 6 where cidade = 'California';

update cliente set cidade = 7 where cidade = 'Berlin';
update vendedor set cidade = 7 where cidade = 'Berlin';

alter table cliente change column cidade id_cidade int;

alter table vendedor change column cidade id_cidade int;

show create table vendedor;

alter table vendedor add constraint FK_cidade_id foreign key (id_cidade) references cidade(id_cidade);

select * from vendedor;

select v.*, c.nome
from cliente as v
inner join cidade as c on c.id_cidade = v.id_cidade;








/*Exercicio 5*/

select p.*, c.nome_cliente, v.nome
from ((pedido as p
join cliente as c on p.id_cliente = c.id_cliente)
join vendedor as v on p.id_vendedor = v.id_vendedor)
where year(p.data_pedido)=2018 and (v.id_cidade = (select cdd.id_cidade from cidade as cdd where cdd.nome='Paris') 
or c.id_cidade = (select cdd.id_cidade from cidade as cdd where cdd.nome='Califórnia'));






/*Exercicio 6*/

select count(p.id_pedido)
from ((pedido as p
join cliente as c on p.id_cliente = c.id_cliente)
join vendedor as v on p.id_vendedor = v.id_vendedor)
where year(p.data_pedido)=2018 and (v.id_cidade = (select cdd.id_cidade from cidade as cdd where cdd.nome='Paris') 
or c.id_cidade = (select cdd.id_cidade from cidade as cdd where cdd.nome='New York'));

/*Exercicio 7*/

select c.nome_cliente, c.gasto, cdd.nome
from cliente as c
join cidade as cdd on c.id_cidade = cdd.id_cidade
where cdd.nome = 'London' and (c.gasto is not null and c.gasto >0);

/*Exercicio 8*/

