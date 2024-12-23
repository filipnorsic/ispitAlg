-- ispiši nazive gradova koji imaju više od 1500 kupaca

select gr.Naziv, count(ku.IDKupac) as BrojKupaca
from grad as gr, kupac as ku
where gr.IDGrad = ku.GradID 
group by ku.GradID 
having BrojKupaca > 1500;


-- ispiši sve proizvode (naziv) s nazivom kategorije i nazivom potkategorije

select pr.Naziv as Proizvod, pk.Naziv as Potkategorija, ka.Naziv as Kategorija
from proizvod as pr
left join potkategorija as pk
on pr.PotkategorijaID = pk.IDPotkategorija 
left join kategorija as ka
on pk.KategorijaID = ka.IDKategorija ;


--  ispiši sve račune (broj računa) s imenom komercijaliste i imenom kupca

select ra.BrojRAcuna, ko.Ime as Komercijalist, ku.Ime as Kupac
from racun as ra
left join komercijalist as ko
on ra.KomercijalistID =ko.IDKomercijalist 
left join kupac as ku
on ra.KupacID = ku.IDKupac ;


-- izračunaj prosječnu cijenu proizvoda u svakoj kategoriji

select ka.Naziv, avg(pr.CijenaBezPDV)
from kategorija as ka
join potkategorija as po
on ka.IDKategorija = po.KategorijaID 
join proizvod as pr 
on po.IDPotkategorija = pr.PotkategorijaID 
group by ka.Naziv ;

-- drugi način rješavanja zadatka iznad (cross join)

select ka.Naziv, avg(pr.CijenaBezPDV)
from kategorija as ka, potkategorija as po, proizvod as pr
where ka.IDKategorija = po.KategorijaID 
and po.IDPotkategorija = pr.PotkategorijaID 
group by ka.Naziv ;


-- pronađi grad s največim brojem naruđbi (računa)

select
	gr.Naziv as Grad
from
	grad as gr
where gr.IDGrad =
	(select
		ku.GradID
	from
		kupac as ku
	join
		racun as ra
	on
		ku.IDKupac = ra.KupacID
	group by
		ku.GradID
	order by
		count(ra.IDRacun) desc limit 1)
		
		
-- drugo rješenje sa join-om, zadatka iznad
		
select count(ra.IDRacun) as ZBrojRacuna, gr.Naziv as Grad
from racun as ra 
join kupac as ku
on ra.KupacID = ku.IDKupac 
join grad as gr 
on gr.IDGrad  = ku.GradID 
group by gr.IDGrad 
order by ZbrojRacuna desc limit 1;



-- dohvati kupce koji su obavili kupnju na više različitih datuma

select ku.Ime, ku.Prezime
from kupac as ku 
join racun as ra 
on ku.IDKupac = ra.KupacID
group by ku.IDKupac 
having count(distinct ra.DatumIzdavanja) > 1;


-- prikaži razliku u količinama prodanih proizvoda između dva najprodavanija proizvoda

select sum(st.Kolicina) - (
							select sum(st1.Kolicina)
							from stavka as st1
							group by st1.ProizvodID
							order by sum(st1.Kolicina) desc limit 1,1
							) as Razlika
from stavka as st
group by st.ProizvodID
order by sum(st.Kolicina) desc limit 1;


-- pronađi mjesec u kojemu ste imali najveći volumen prodaje

select month (ra.DatumIzdavanja) as Mjesec, sum(st.UkupnaCijena) as Zarada
from racun as ra 
join stavka as st 
on st.RacunID = ra.IDRacun 
group by Mjesec
order by Zarada desc ;























