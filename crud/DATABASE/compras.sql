#Criando o banco de dados compras
CREATE DATABASE compras
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

#Selecionado o banco compras
Use compras;
select * from cliente;
select * from produtos;

#Criando a tabela cliente
CREATE TABLE cliente (
id int not null auto_increment,
nome varchar(60) not null,
cpf varchar(20) not null,
email varchar(150) not null,
PRIMARY KEY (id)
)ENGINE=InnoDB;

#Criando a tabela produtos
CREATE TABLE produtos (
id int not null auto_increment,
nome_produto varchar(255) not null,
cod_barras varchar(40) not null unique key,
valor_unidade decimal(11,2) not null,
PRIMARY KEY (id)
)ENGINE=InnoDB;

#Criando a tabela pedidos
CREATE TABLE pedidos (
numero_pedido int not null auto_increment primary key,
data_pedido datetime not null,
id_cliente int not null,
id_produtos int not null,
id_valor decimal (8,2),
quantidade int not null,
total decimal(11,2) not null,
foreign key (id_cliente) references cliente (id),
foreign key (id_produtos) references produtos (id),


)ENGINE=InnoDB;

select * from pedidos;
select * from produtos;
delete from pedidos;