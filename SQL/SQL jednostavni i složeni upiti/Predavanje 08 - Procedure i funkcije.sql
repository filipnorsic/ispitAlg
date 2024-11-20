use adventureworkshop;

-- funkcije

delimiter $$
create function BrojKupaca()
returns int
deterministic
begin
	declare brojKupaca int;
	select count(*) into brojKupaca from kupac;
    return brojKupaca;
end $$
delimiter ;

select BrojKupaca();



delimiter $$
create function BrojKupacaPoGradu(GradID int)
returns int
deterministic
begin
	declare brojKupaca int;
	select count(*) into brojKupaca from kupac where kupac.GradID = GradID;
    return brojKupaca;
end $$
delimiter ;

select BrojKupacaPoGradu(1);



-- procedure

delimiter $$
create procedure DodajKreditnuKarticu(
										in Tip varchar(50),
										in Broj varchar(25),
										in IstekMjesec tinyint,
										in IstekGodina int
)
begin
	if length(Broj) = 16 then 
		insert into kreditnakartica
		(Tip, Broj, IstekMjesec, IstekGodina) values
		(Tip, Broj, IstekMjesec, IstekGodina);
	else 
	signal sqlstate '45000'
	set message_text = 'Broj kreditne kartice mora imati točno 16 znakova';
	end if;
end $$
delimiter ;

call DodajKreditnuKarticu(
	'Kreditna',
	'1234567890123456',
	'12',
	'2025'
);

select * from adventureworkshop.kreditnakartica;



-- definiraj proceduru koja će omogučiti narudžbu određenog proizvoda tako da provjeri stanje na skladištu
-- ako proizvod je dostupan vrati ok i umanji stanje na skladištu za poslanu količinu.
-- ako nema proizvoda na skladištu ili ako je željena količina veča od stanja vrati ERR


delimiter $$
create procedure NaruciProizvod(
	in ProizvodID int,
	in Kolicina int,
	out StatusNarudzbe varchar(10)
)
begin
	declare RaspolozivaKolicina int;
	select MinimalnaKolicinaNaSkladistu into RaspolozivaKolicina
	from proizvod
	where proizvod.IDProizvod = ProizvodID;

	if RaspolozivaKolicina >= Kolicina then
		update proizvod 
		set MinimalnaKolicinaNaSkladistu = RaspolozivaKolicina - Kolicina
		where proizvod.IDProizvod = ProizvodID;
	
		set StatusNarudzbe = 'OK';
	else
		set StatusNarudzbe = 'ERR';
	end if;	
end $$
delimiter ;

call NaruciProizvod(2, 50, @StatusNarudzbe);
select @StatusNarudzbe as status;



















