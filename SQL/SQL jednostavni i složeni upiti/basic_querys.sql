use adventureworkshop;

-- Dohvati sve proizvode
select * from proizvod;

-- dohvati prvih 5 proizvoda
select * from proizvod limit 5 offset 5;

-- izbroji proizvode u svakoj podkategoriji
select PotkategorijaID, count(*) as BrojProizvoda
from proizvod 
group by PotkategorijaID ;

-- izbroji ukupnu prodaju za svakog komercijalista
SELECT KomercijalistID, COUNT(*) as ukupnaProdaja
from racun
group by KomercijalistID; 

-- ispiši sve gradove s imenom države (cros join)
select grad.Naziv as Grad, drzava.Naziv as Drzava
from grad, drzava
where grad.DrzavaID = drzava.IDDrzava;

-- inner join
select grad.Naziv as Grad, drzava.Naziv as Drzava
from grad
inner join drzava
on grad.DrzavaID = drzava.IDDrzava;


-- left join, left je from a right je left join
select grad.Naziv as Grad, drzava.Naziv as Drzava
from grad
left join drzava
on grad.DrzavaID = drzava.IDDrzava;

-- full outer join
select grad.Naziv as Grad, drzava.Naziv as Drzava
from grad
left join drzava
on grad.DrzavaID = drzava.IDDrzava
union
select grad.Naziv as Grad, drzava.Naziv as Drzava
from grad
right join drzava
on grad.DrzavaID = drzava.IDDrzava;

-- full alter join with exclusion (neznam da li se tako zove)
select grad.Naziv as Grad, drzava.Naziv as Drzava
from grad
left join drzava
on grad.DrzavaID = drzava.IDDrzava
union
select grad.Naziv as Grad, drzava.Naziv as Drzava
from grad
left join grad
on grad.DrzavaID = drzava.IDDrzava
where drzava.IDDrzava is null;




