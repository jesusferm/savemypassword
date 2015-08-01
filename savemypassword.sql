create database savemypassword;
use savemypassword;

create table usuarios(
	iduser int auto_increment,
	cuentauser varchar(80),
    passwd varchar(200),
    typeuser int,
    fraseuser varchar(200),
    activated int,
    nomuser varchar(90),
    apuser varchar(90),
    primary key(iduser, cuentauser)
);

create table passwords(
	iduser int,
    nomcuenta varchar(90),
    passcuenta varchar(200),
    descripcuenta varchar(200),
    activated int,
    foreign key (iduser) references usuarios(iduser),
    primary key(iduser,nomcuenta)
);
/*Para insertar una nueva cuenta de usuario*/
insert into usuarios (cuentauser, passwd, typeuser, fraseuser, activated, nomuser, apuser) 
values('hackme@please.com','holamundo',0,'',0,'Usuario Uno','Hackme');

select * from usuarios;

insert into passwords values(1,'usera2@gmail.com','adiosmundo@','Cuenta de gmail para hackear',0);
select * from passwords;



