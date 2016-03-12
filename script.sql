
DROP TABLE IF EXISTS spectacle;
DROP TABLE IF EXISTS theatre;

CREATE TABLE theatre (
	id_theatre int(10) AUTO_INCREMENT PRIMARY KEY,
	nom_theatre  varchar(50),
	adr_theatre varchar(200),
	tel_theatre varchar(10)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE spectacle (
	id_spectacle int(10) AUTO_INCREMENT PRIMARY KEY,
	nom varchar(200),
	date_representation date,
	prix int(5),
	id_theatre int(10),
	CONSTRAINT c1_idtheatre FOREIGN KEY (id_theatre) REFERENCES theatre(id_theatre)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;


insert into theatre values (NULL,"Le Granit","1 faubourg de Montbéliard 90000 Belfort","0384586767");
insert into theatre values (NULL,"Aktéon","11 rue du Général-Blaise 70000 Paris","0143387462");
insert into theatre values (NULL,"Théâtre National de Strasbourg","1 Avenue de la Marseillaise 67005 Strasbourg","0388248800");
insert into theatre values (NULL,"Les deux scènes","49 Rue Megevand 25000 Besançon","0381878197");

insert into spectacle values (1,"LE PRINCE (Tous les hommes sont méchants)","2014-10-14","9",1);
insert into spectacle values (2,"Le chemin du sepent","2014-10-18","8",1);
insert into spectacle values (3,"Le cabinet des curiosités","2014-11-13","12",2);
insert into spectacle values (4,"Trois actrice dont une","2014-11-16","10",2);
insert into spectacle values (5,"Ainsi se laissa t-il vivre","2014-11-08","13",3);
insert into spectacle values (6,"Lancelot du lac","2014-12-02","15",3);
insert into spectacle values (7,"Si oui, oui, sinon, non","2014-11-04","12",3);
insert into spectacle values (8,"Tiger tiger burning bright","2014-10-16","15",4);



select spectacle.nom, spectacle.date_representation, spectacle.prix,
theatre.adr_theatre, theatre.nom_theatre
from spectacle join theatre
on spectacle.id_theatre = theatre.id_theatre;

