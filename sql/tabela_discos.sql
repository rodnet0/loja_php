create table discos(
	id int primary key not null auto_increment,
	 nome varchar(100) not null,
	 autor varchar(100) not null,
	 tipo int not null,
	genero varchar(50) not null,
	data date not null,
    gravadora varchar(50) not null);