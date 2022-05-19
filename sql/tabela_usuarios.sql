/*CRIANDO A TABELA PARA CADASTRO DE USUARIOS*/
CREATE TABLE usuarios(
	id int primary key not null auto_increment,
	login varchar(100) not null,
	nome varchar(255) not null,
	contato varchar(12) not  null,
	senha varchar(255) not null,
	email varchar(100),
	data date,
	ativo int default 1 
);

/*ADICIONANDO USUARIO NA TABELA	DE USUARIOS*/
INSERT INTO usuarios (login, nome, contato, senha, email) VALUES ('admin', 'administrador', '19 3939-6000', '123456', 'contato@rcti.com.br');
