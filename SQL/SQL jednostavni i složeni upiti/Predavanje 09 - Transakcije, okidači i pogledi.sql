


create or replace view Grad_Drzava as
select gr.Naziv as Grad, dr.Naziv as Drzava
from Grad as gr
left join Drzava as dr
on gr.DrzavaID = dr.IDDrzava 
order by Drzava ;

select * from Grad_Drzava;



update grad_drzava set Drzava = "Hrvatska" 
where Grad like "%Boka Kotorska%";



-- procedura za narudzbu proizvoda

delimiter $$
create procedure NaruciProizvod(
	in ProizvodID int,
    in Kolicina int
)
begin
	declare RaspolozivaKolicina int;
    declare CijenaPoKomadu decimal;
 
    start transaction;
 
    select MinimalnaKolicinaNaSkladistu, CijenaBezPDV
    into RaspolozivaKolicina, CijenaPoKomadu
    from Proizvod
    where IDProizvod = ProizvodID;
 
    if CijenaPoKomadu is null then
		rollback;
	else
		update Proizvod
		set MinimalnaKolicinaNaSkladistu = RaspolozivaKolicina - Kolicina
		where IDProizvod = ProizvodID;
 
		insert into Racun (DatumIzdavanja, BrojRacuna, KupacID)
		values(now(), '1225877546', 1);
 
		set @racunID = last_insert_id();
 
		insert into Stavka 
		(RacunID, Kolicina, ProizvodID, CijenaPoKomadu, PopustUPostocima, UkupnaCijena)
		values
		(@racunID, Kolicina, ProizvodID, CijenaPoKomadu, 0, CijenaPoKomadu * Kolicina);
 
		if RaspolozivaKolicina >= Kolicina then
			commit;
		else
			rollback;
			signal sqlstate '45000'
			set message_text = "Nema dovoljno proizvoda na zalihi.";
		end if;
	end if;
 
end $$
delimiter ;


delimiter $$
create trigger AzurirajPromjenuZaliha
after update on Proizvod 
for each row 
begin 
	if old.MinimalnaKolicinaNaSkladistu <> new.MinimalnaKolicinaNaSkladistu
		then insert into zapisnik (Poruka)
		values(concat('Promjenjena kolicina za proizvod ', new.naziv, ', Staro stanje: ',
			old.MinimalnaKolicinaNaSkladistu, ', Novo stanje: ', new.MinimalnaKolicinaNaSkladistu,
			', Datum: ', now()
		));
	end if;
end $$
delimiter ;

 
 
call NaruciProizvod(8000,50);

call NaruciProizvod (1, 50);
















