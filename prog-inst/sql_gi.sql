create database gestion_de_Instituto;

use gestion_de_Instituto;

CREATE TABLE persona(
ci int (8) primary key,
nombre varchar (20) not null,
apellido varchar (20) not null,
fech_nac date not null,
pass int (4),
rol varchar (20) not null,
nuevo tinyint default 0,
baja boolean default 0,
CHECK( rol IN('func','adm', 'est', 'docente', 'visit' )  )
 );

 CREATE TABLE tel_persona(
 ci int (8) primary key,
 tel varchar(9),
 FOREIGN KEY (ci) REFERENCES persona(ci)
 );

 CREATE TABLE ingreso(
 id_ingreso int auto_increment primary key,
 fecha DATE not null,
 hora TIME not null,
 ci varchar (8),
 motivo varchar(100) default "ingreso",
 baja boolean default 0,
 foreign key (ci) references persona(ci));


INSERT INTO persona (ci, nombre, apellido, fech_nac, pass, rol, nuevo, baja)
VALUES
    (12345678, 'Juan', 'Perez', '1990-01-15', 1234, 'est', 0, false),
    (23456789, 'Maria', 'Lopez', '1985-05-20', 5678, 'docente', 1, false),
    (34567890, 'Pedro', 'Gomez', '1982-09-10', 7890, 'adm', 0, false),
    (45678901, 'Laura', 'Rodriguez', '1998-03-25', 4321, 'func', 1, false),
    (56298504, 'Marcos', 'da Costa', '2003-01-25', 1899, 'adm', 0, false),
    (56789012, 'Carlos', 'Fernandez', '1976-12-08', 6789, 'visit', 1, false);


INSERT INTO tel_persona (ci, tel)
VALUES
    (12345678, '123456789'),
    (23456789, '234567890'),
    (34567890, '345678901'),
    (45678901, '456789012'),
    (56789012, '567890123');


INSERT INTO ingreso (fecha, hora, ci, motivo, baja)
VALUES
    ('2023-08-05', '10:30:00', '12345678', 'ingreso', false),
    ('2023-08-27', '11:00:00', '23456789', 'ingreso', false),
    ('2023-09-20', '12:00:00', '34567890', 'ingreso', false),
    ('2023-09-25', '13:00:00', '45678901', 'ingreso', false),
    ('2023-09-28', '14:00:00', '56789012', 'inscripcion', false);
