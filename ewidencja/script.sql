/*
Created		2007-02-22
Modified	2007-02-22
Project		Ewidencja oprogramowania
Model		
Company		
Author		Tomek Pietrzyk
Version		
Database	mySQL 4.1 
*/


drop table IF EXISTS komp_opr;
drop table IF EXISTS oprogramowanie_temp;
drop table IF EXISTS oprogramowanie;
drop table IF EXISTS komputery;


Create table komputery (
	id_komputer Smallint NOT NULL AUTO_INCREMENT,
	nazwa Varchar(20) NOT NULL,
	opis Text,
 Primary Key (id_komputer)) ENGINE = InnoDB
CHARACTER SET utf8
AUTO_INCREMENT = 0;

Create table oprogramowanie (
	id_oprogramowania Smallint NOT NULL,
	nazwa Varchar(30) NOT NULL,
	producent Varchar(20) NOT NULL,
	wersja Varchar(20),
	nr_seryjny Varchar(30) NOT NULL,
	klucz_licencji Varchar(20),
	data_zakupu Date NOT NULL,
	termin_licencji Date NOT NULL,
 Primary Key (id_oprogramowania)) ENGINE = InnoDB
CHARACTER SET utf8
AUTO_INCREMENT = 0;

Create table oprogramowanie_temp (
	id_oprogramowania Smallint NOT NULL,
	id_komputer Smallint NOT NULL,
	nazwa Varchar(30) NOT NULL,
	producent Varchar(20) NOT NULL,
	wersja Varchar(20),
	nr_seryjny Varchar(30) NOT NULL,
	klucz_licencji Varchar(20),
	data_zakupu Date NOT NULL,
	termin_licencji Date NOT NULL,
 Primary Key (id_oprogramowania)) ENGINE = InnoDB
CHARACTER SET utf8
AUTO_INCREMENT = 0;

Create table komp_opr (
	id_komputer Smallint NOT NULL,
	id_oprogramowania Smallint NOT NULL,
	id_komp_opr Smallint NOT NULL AUTO_INCREMENT,
 Primary Key (id_komp_opr)) ENGINE = InnoDB
CHARACTER SET utf8
AUTO_INCREMENT = 0;


Alter table komp_opr add Foreign Key (id_komputer) references komputery (id_komputer) on delete cascade on update cascade;
Alter table komp_opr add Foreign Key (id_oprogramowania) references oprogramowanie (id_oprogramowania) on delete cascade on update cascade;


/* Users permissions */


