drop database if exists parcijalni_ispit;

create database if not exists parcijalni_ispit
character set utf8mb4 collate utf8mb4_general_ci;

use parcijalni_ispit;

create table zaposlenici (
	IDZaposlenik int unsigned auto_increment,
	Ime varchar (25) not null,
	Prezime varchar (25) not null,
	Email varchar (50) not null unique,
	IznosPlace decimal (4,2) not null,
	primary key (IDZaposlenik)
);

create table odjel (
	IDOdjel int unsigned auto_increment,
	NazivOdjel varchar (20) not null,
	primary key (IDOdjel)
);

create table zaposlenici_odjel (
	IDzaposlenici_odjel int unsigned auto_increment,
	ZaposlenikID int unsigned,
	OdjelID int unsigned,
	DaLiJeVoditelj bool,
	primary key (IDzaposlenici_odjel)
);

alter table odjel
add constraint fk_odjel_zaposlenik
foreign key (ZaposlenikID) references zaposlenici (IDZaposlenik);

alter table zaposlenici_odjel 
add constraint fk_voditelj_zaposlenik
foreign key (ZaposlenikID) references zaposlenici (IDZaposlenik),
add constraint fk_voditelj_odjel
foreign key (OdjelID) references odjel (IDOdjel);


insert into odjel (NazivOdjel)
value ('Sistem ing');

ALTER TABLE zaposlenici
MODIFY COLUMN IznosPlace decimal (6,2);


insert into zaposlenici (Ime, Prezime, Email, IznosPlace)
values ('Mirko', 'Mirkić', 'mirko.mirkic@sisteming.hr', '2360.10');


insert into zaposlenici_odjel (ZaposlenikID, OdjelID, DaLiJeVoditelj)
values (13,5,false);



-- Dohvatite sve zaposlenike i njihove plaće.

select Ime, Prezime, IznosPlace from zaposlenici;


-- Dohvatite sve voditelje odjela i izračunajte prosjek njihovih plaća.

select avg(IznosPlace) as Prosjecna_placa_voditelja_odjela  from zaposlenici as za
join zaposlenici_odjel as zo
on za.IDZaposlenik = zo.ZaposlenikID 
where zo.DaLiJeVoditelj = 1;


-- Kreirajte proceduru koja će računati prosjek plaća svih zaposlenika.


delimiter $$
create procedure ProsjecnaPlaca(
	out prosjecna_placa decimal (6,2)
)

begin
	select avg(IznosPlace) from zaposlenici; 
end $$
delimiter ;

call ProsjecnaPlaca(@prosjecna_placa);





























