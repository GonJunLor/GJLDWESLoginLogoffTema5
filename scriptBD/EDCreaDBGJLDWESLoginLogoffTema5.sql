/**
 * Author:  gonzalo.junlor
 * Created: 16 nov. 2025
 * Script de creación de base de datos
 */
create database if not exists DBGJLDWESLoginLogoffTema5;

create table if not exists DBGJLDWESLoginLogoffTema5.T02_Departamento(
    T02_CodDepartamento varchar(3) primary key,
    T02_DescDepartamento varchar(255),
    T02_FechaCreacionDepartamento datetime not null,
    T02_VolumenDeNegocio float null,
    T02_FechaBajaDepartamento datetime null
)engine=innodb;

create table if not exists DBGJLDWESLoginLogoffTema5.T01_Usuario(
    T01_CodUsuario varchar(10) not null primary key,
    T01_Password varchar(64) not null,
    T01_DescUsuario varchar(255) not null,
    T01_NumConexiones int not null default 0,
    T01_FechaHoraUltimaConexion datetime default null,
    T01_Perfil varchar (100) not null default 'usuario',
    T01_ImagenUsuario BLOB default null
)engine=innodb;

create user if not exists 'userGJLDWESLoginLogoffTema5'@'%' identified by '5813Libro-Puro';
-- create user if not exists 'userGJLDWESLoginLogoffTema5'@'%' identified by 'paso';

grant all privileges on *.* to 'userGJLDWESLoginLogoffTema5'@'%' with grant option;

flush privileges;