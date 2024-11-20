-- Dohvatite sve podatke o kreditnim karticama
select * from kreditnakartica;

-- Dohvatite sve proizvode koji imaju stanje zaliha manje od 50
select * from proizvod
where MinimalnaKolicinaNaSkladistu < 50;

-- Dohvati sve kupovine određenog kupca (npr. KupacID = 1)
select BrojRacuna, KupacID from racun
where kupacID = 1;

-- Dohvati proizvode bez dodijeljene potkategorije
select Naziv as nazivProizvodaBezPodkategorije
from proizvod
where PotkategorijaID is null;

-- Identificirajte državu s najvećim brojem gradova koristeći podupit.
select drzava.Naziv, count(grad.DrzavaID) as brojGradova   from drzava
join grad 
on drzava.IDDrzava = grad.DrzavaID
group by grad.DrzavaID  order by count(grad.DrzavaID) desc limit 1 ;




-- Dohvatite sve proizvode čija je zaliha ispod prosječne zalihe za njihovu potkategoriju.



