-- Napredni upiti s povezivanjem tablica:
	
	-- Ispiši kupce i imena gradova u kojima žive

select ku.Ime, ku.Prezime, gr.Naziv as Grad
from kupac as ku
join grad as gr
on ku.GradID  = gr.IDGrad ;


	-- Ispiši račune  zajedno s detaljima o kupcu i proizvodu

select ra.BrojRacuna, ku.Ime, ku.Prezime, pr.Naziv as naziv_artikla
from racun as ra
join kupac as ku
on ra.KupacID = ku.IDKupac 
join stavka as st
on ra.IDRacun = st.IDStavka 
join proizvod as pr
on st.ProizvodID  = pr.IDProizvod ;



-- Složeni upiti koji uključuju agregatne funkcije, podupite i uvjete:

	-- Izračunaj prosječnu cijenu proizvoda u svakoj kategoriji

select ka.Naziv, avg(pr.CijenaBezPDV)
from kategorija as ka
join potkategorija as po
on ka.IDKategorija = po.KategorijaID 
join proizvod as pr 
on po.IDPotkategorija = pr.PotkategorijaID 
group by ka.Naziv ;


	-- Pronađi najpopularniji proizvod na temelju količine u računima

???????????????????????????????


	-- Prikaz proizvoda koji nisu niti jednom kupljeni

???????????????????????????

	-- Prikaži ukupni iznos prodaje za svaki grad


























