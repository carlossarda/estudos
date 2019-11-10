create database incucaTeste;

use incucaTeste;

create table vendedor (
id_vendedor int(4) not null auto_increment primary key,
nome varchar(255) not null,
cidade varchar(255),
comissao float(2,3)
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
data_pedido date not null,
id_cliente int(4) not null,
id_vendedor int(4) not null,
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
insert into cliente (id_cliente, nome_cliente, cidade, gasto, id_vendedor) values (4001, 'Brad Guzan',  'London', '', 5005);
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

/*Exercicio 1*/

SELECT p.id_pedido, p.data_pedido, p.qtd_comprada, c.nome_cliente, c.cidade, c.gasto
FROM ((pedido AS p
    INNER JOIN cliente AS c ON p.id_cliente = c.id_cliente)
    INNER JOIN vendedor AS v ON p.id_vendedor = v.id_vendedor)
WHERE v.comissao > 0.12;

/*Exercicio 2*/

SELECT 
    c.id_cliente,
    UCASE(c.nome_cliente) AS nome_cliente,
    UCASE(c.cidade) AS cidade,
    c.gasto,
    UCASE(v.nome) AS nome,
    UCASE(v.cidade) AS cidade
FROM
    (cliente AS c
    INNER JOIN vendedor AS v ON v.id_vendedor = c.id_vendedor);
    
/*Exercicio 3*/

SELECT 
    c.*, v.nome, v.comissao
FROM
    cliente AS c
        INNER JOIN
    vendedor AS v ON c.id_vendedor = v.id_vendedor
WHERE
    v.comissao = (SELECT 
            MAX(v.comissao)
        FROM
            vendedor AS v);

/*Exercicio 4*/

CREATE TABLE cidade (
    id_cidade INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

insert into cidade (nome) values ('London');
insert into cidade (nome) values ('New York');
insert into cidade (nome) values ('Paris');
insert into cidade (nome) values ('Rome');
insert into cidade (nome) values ('Moscow');
insert into cidade (nome) values ('California');
insert into cidade (nome) values ('Berlin');
insert into cidade (nome) values ('Vazia');

alter table vendedor add id_cidade int;

alter table cliente add id_cidade int;

UPDATE vendedor AS v
        INNER JOIN
    cidade AS c 
SET 
    v.id_cidade = c.id_cidade
WHERE
    c.nome = v.cidade;

UPDATE cliente AS cl
        INNER JOIN
    cidade AS c 
SET 
    cl.id_cidade = c.id_cidade
WHERE
    cl.cidade = c.nome;

UPDATE vendedor AS v 
SET 
    v.id_cidade = 8
WHERE
    ISNULL(v.id_cidade);

alter table cliente drop column cidade;

alter table vendedor drop column cidade;

alter table vendedor add constraint FK_cidade_id foreign key (id_cidade) references cidade(id_cidade);

alter table cliente add constraint FK_id_cidade foreign key (id_cidade) references cidade(id_cidade);

/*Exercicio 5*/

SELECT 
    p.*, c.nome_cliente, v.nome
FROM
    ((pedido AS p
    JOIN cliente AS c ON p.id_cliente = c.id_cliente)
    JOIN vendedor AS v ON p.id_vendedor = v.id_vendedor)
WHERE
    YEAR(p.data_pedido) = 2018
        AND (v.id_cidade = (SELECT 
            cdd.id_cidade
        FROM
            cidade AS cdd
        WHERE
            cdd.nome = 'Paris')
        OR c.id_cidade = (SELECT 
            cdd.id_cidade
        FROM
            cidade AS cdd
        WHERE
            cdd.nome = 'Califórnia'));

/*Exercicio 6*/

SELECT 
    COUNT(p.id_pedido) AS quantidade_pedidos
FROM
    ((pedido AS p
    JOIN cliente AS c ON p.id_cliente = c.id_cliente)
    JOIN vendedor AS v ON p.id_vendedor = v.id_vendedor)
WHERE
    YEAR(p.data_pedido) = 2018
        AND (v.id_cidade = (SELECT 
            cdd.id_cidade
        FROM
            cidade AS cdd
        WHERE
            cdd.nome = 'Paris')
        OR c.id_cidade = (SELECT 
            cdd.id_cidade
        FROM
            cidade AS cdd
        WHERE
            cdd.nome = 'New York'));

/*Exercicio 7*/

SELECT 
    c.nome_cliente, c.gasto, cdd.nome
FROM
    cliente AS c
        JOIN
    cidade AS cdd ON c.id_cidade = cdd.id_cidade
WHERE
    cdd.nome = 'London'
        AND (c.gasto IS NOT NULL AND c.gasto > 0);
        

/*Exercicio 8*/


UPDATE cliente AS c
        JOIN
    vendedor AS v ON v.id_vendedor = c.id_vendedor 
SET 
    c.nome_cliente = 'Fábio Jr'
WHERE
    v.id_cidade = (SELECT 
            cdd.id_cidade
        FROM
            cidade AS cdd
        WHERE
            cdd.nome = 'Rome');

/*Exercicio 9*/

DELETE pedido FROM pedido
        INNER JOIN
    cliente AS c ON pedido.id_cliente = c.id_cliente 
WHERE
    c.nome_cliente = 'Fábio Jr';