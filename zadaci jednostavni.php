
Napišite kratak PHP kod koji koristi
Do-While petlju za ispisivanje
brojeva od 49 do 13.

<?php
$broj = 49;
do {
    echo $broj . "<br>";
    $broj--;
} while ($broj >= 13);

?>

-------------------------------------------------------------------------------------------------------------------------------------

Napišite kratki PHP kod koji
koristi While petlju za
ispisivanje neparnih brojeva od
14 do 34.

<?php
$i=14;
while ($i <= 34) {
    if ($i % 2 != 0) {
        echo $i . "<br>";
    }
    $i++;
}
?>

-------------------------------------------------------------------------------------------------------------------------------------

Napišite kratki PHP kod koji koristi
for petlju za ispis svih brojeva od
1-100 koji su djeljivi sa 7 ili 9 ali
preskoči brojeve 63, 70 i 90.

<?php
for ($i = 1; $i <= 100; $i++){
    if (($i % 7 == 0 || $i % 9 == 0) && $i != 63 && $i != 70 && $i != 90) {
        echo $i . "<br>";
    }
}
?>

primjer sa continue

<?php

for ($i = 1; $i <= 100; $i++){
    if ($i == 63 || $i == 70 || $i == 90) {
        continue;
    }
    if ($i % 7 == 0 || $i % 9 == 0) {
        echo $i . "<br>";
    }
}
?>

-------------------------------------------------------------------------------------------------------------------------------------

Napišimo funkciju u PHP-u
koja prima dva parametra:
• broj brojeva koji se
generiraju i s kojim brojem
bi trebali biti djeljivi
• dodaje generirane brojeve
na kraj polja.

<?php

function generiraj_djeljive_brojeve($broj_brojeva, $dijeljiv_s, &$niz_brojeva){

    for($i = 1; $i <= $broj_brojeva; $i++){
        array_push($niz_brojeva, $i*$dijeljiv_s);
    }
    return $niz_brojeva;
}

$niz_brojeva = array(10,20,30,40,50);
$dijeljiv_s = 7;
$broj_brojeva = 5;

generiraj_djeljive_brojeve($broj_brojeva, $dijeljiv_s, $niz_brojeva);
print_r($niz_brojeva);

?>

-------------------------------------------------------------------------------------------------------------------------------------

/*zdatak:
⚫ Definirajte varijablu names i dodijelite joj niz koji sadrži pet imena.
⚫ Koristeći petlju foreach, iz niza ispišite ključeve i pripadajuće im vrijednosti.*/

$names = array("John", "Jane", "Doe", "Smith", "Doe");
foreach($names as $key => $value){
    echo $key . " => " . $value . "<br>";
}

-------------------------------------------------------------------------------------------------------------------------------------

⚫ Proizvoljno deklarirajte funkciju koja ima jedan argument (number). Funkcija treba imati lokalnu
varijablu u koju će pribrojiti vrijednost argumenta number te istu vratiti kao rezultat. Vrijednost
treba biti zadržana kod svakog poziva funkcije.
⚫ Deklarirajte funkciju kao varijablu.
⚫ Pozovite funkciju pomoću varijable, a kao vrijednost argumenta pošaljite slučajan broj u rasponu
od 1 do 10 te ispišite rezultat.
⚫ Ponovite postupak pet puta.

<?php
function randomAdd(int $number): int{
    static $sum = 0;
    $sum += $number;
    return $sum;
}

$sum = randomAdd(5);
echo $sum;
$sum = randomAdd(5);
echo $sum;

$test = 'randomAdd';     //varijabli dodajemo funkciju, ovo nije dobro raditi
var_dump($test(5));


?>

-------------------------------------------------------------------------------------------------------------------------------------

Kako deklarirati PHP funkciju koja prihvaća promjenjivi broj argumenata?
(zadatak)

function mul( ...$numbers ) { 
     print_r($numbers);
   }
   mul(55, 16, 22, 99);

-------------------------------------------------------------------------------------------------------------------------------------

<?php
/*
kreiraj niz koji sadrzi podatke o studentima
1. filtriraj studente koji imaju prosječnu ocjenu iznad 3.5
2. izračunaj prosječnu ocijenu svih studenata koji su prošli filtraciju
3. odredi broj studenata u svakoj godini studija
*/ 

//1.
$studenti = [
    ["ime" => "Ana", "prezime" => "Anić", "godina" => "prva", "prosjek" => 4.2],
    ["ime" => "Ivan", "prezime" => "Ivanić", "godina" => "druga", "prosjek" => 3.1],
    ["ime" => "Marko", "prezime" => "Markovski", "godina" => "treca", "prosjek" => 3.7],
    ["ime" => "Lucija", "prezime" => "Lucić", "godina" => "prva", "prosjek" => 4.8],
    ["ime" => "Hrvoje", "prezime" => "Hrvatko", "godina" => "druga", "prosjek" => 4.0],    
];

$izvrsniStudenti = array_filter($studenti, function($student){
    return $student["prosjek"] > 3.5;
});

print_r($izvrsniStudenti);

//2.

$arrayProsjeka = array_column($izvrsniStudenti, "prosjek");
$prosjekIzvrsnihStudenata = array_sum($arrayProsjeka) / count($izvrsniStudenti);
print_r($prosjekIzvrsnihStudenata);

//3.
 $arrayGodina= array_column($studenti, "godina");
 print_r($arrayGodina);

 $brojStudenataUSvakojGodini = array_count_values($arrayGodina);
 print_r($brojStudenataUSvakojGodini);


?>

-------------------------------------------------------------------------------------------------------------------------------------

<?php
/*
$fruits =["jabuke", "banane", "naranče", "kiwi", "mango"];
$fruits[] = "ananas";
array_push($fruits, "grožđe");
unset($fruits[0]);      //makne prvi element, ali ostali indexi ostaju kakvi su bili
array_shift($fruits);    //makne prvi element i preindexira ostale elemente, poreda ih od nule na dalje



print_r($fruits) ;

*/

//kreiraj dva niza koji sadrže po tri broja
//spoji ova dva niza u jedan niz
/*
$prvi = [2, 3, 7];
$drugi = [2, 5, 9];
$spojeniNiz = array_merge($prvi, $drugi);
$spojeniNiz = [...$prvi, ...$drugi];

print_r($spojeniNiz);
*/

//kreiraj niz koji sadrži 5 ocjena, izračunaj prosječnu ocjenu
/*
$ocjene = [2,4,5,3,4];
$rezultat = array_sum($ocjene) / count($ocjene);
print_r($rezultat);
*/

//kreiraj niz sa 10 brojeva i izdvoji sve brojeve 
//veće od 5 u novi niz

$brojevi = [1,8,6,4,8,3,7,1,0,5];
$brojeviVeciOdPet = array_filter($brojevi, function($broj){
    return $broj > 5;
});
$reindeksiraniBrojevi = array_values($brojeviVeciOdPet);
print_r($reindeksiraniBrojevi);


?>

-------------------------------------------------------------------------------------------------------------------------------------

//napišite php skriptu koja provjerava koji je dan u tjednu i  ispisuje odgovarajuču poruku
/*
$danUTjednu = date("N");
    switch($danUTjednu){
        case 1:
            echo "Danas je ponedjeljak";
            break;
        case 2:
                echo "Danas je utorak";
                break;  
        case 3:
                echo "Danas je srijeda";
                break; 
        case 4:
                echo "Danas je četvrtak";
                break;
        case 5:
                echo "Danas je petak";
                break;
        case 6:
                echo "Danas je subota";
                break;
        case 7:
                echo "Danas je nedjelja";
                break;
        default: echo "nepoznat dan";
        break;
    }
*/

-------------------------------------------------------------------------------------------------------------------------------------

<?php
/*
$studenti = [

        "Ana" => 95,
        "Ivan" => 85,
        "Petar" => 75,
        "Maja" => 65,
        "Jasna" => 55,
        "Marko" => 45,
        "Iva" => 35,
        "Luka" => 25,
        "Klara" => 15,
        "Filip" => 5

];

foreach($studenti as $ime => $bodovi){
    echo "Student/ica $ime je dobio/la ocjenu ";
    if($bodovi > 92){
        echo "odličan";
    }elseif($bodovi > 75){
        echo "vrlo dobar";
    }elseif($bodovi > 62){
        echo "dobar";
    }elseif($bodovi > 51){
        echo "dovoljan";
    }else{
        echo "nedovoljan";
    }
    echo "<br>";


}

*/
?>

-------------------------------------------------------------------------------------------------------------------------------------

<?php



//1. zadatak
//napiši funkciju koja vrača neki tekst
//pozovite funkciju i vračenu vrijednost dodjelite varijabli
//ispiši vrijednost varijable
/*
function vratiTekst(): string{
    return 'ovo je neki tekst';
}

$tekst = vratiTekst();

echo $tekst;
*/

//zadatak 2
//napiši funkciju koja ima dva parametra, ime i prezime
//funkcija treba konkatenirati ime i prezime i zapisati u lokalnu varijablu
//zatim vrijednost u lokalnoj varijabli treba pretvoriti u velika slova 
//funkcija treba vratiti vrijednost lokalne varijable
// pozovite funkciju i spremite vračenu vrijednost u varijablu
// ispiši vrijednost varijable
/*
function fullName (string $name, string $surname):string{

    $result = $name . ' ' . $surname;
    return mb_strtoupper($result);
}

$fullName = fullName('Filip', 'Noršić');

echo $fullName;
*/

//zadatak 3 callback funkcija


function mat(int $a, int $b, callable $callback): int{

return $callback($a, $b);

}

mat(5, 10, 'add');
function add($a, $b){
    return $a + $b;
}

add(5, 10);

$zbroji = 'add';
$zbroji(5, 10);

?>

-------------------------------------------------------------------------------------------------------------------------------------

ISPISUJE BROJEVE UNATRAG, POZIVANJE FUNKCIJE U FUNKCIJI (rekurzija)

<?php

function countDown(int $number) : void {
if ($number === 0) {
    return;
}
echo $number;
countDown($number -1);
}

countDown(3);

?>

FAKTORIJAL:

<?php
function faktorijal (int $number): int {
    if ($number === 1){
        return 1;
    }
    return $number * faktorijal($number -1);
}

faktorijal(3);
/*
faktorijal(1) -> "vrati 1"
faktorijal(2) -> vrati 2*1=2
faktorijal(3) -> vrati 3*2*1=6
*/
?>

-------------------------------------------------------------------------------------------------------------------------------------

REFERENCA ZADATAK

<?php

$age = 30;

function promijeniGodine(int $godine): void {
    $GLOBALS['age'] = $godine;
    
}

promijeniGodine(40);
echo $age;

function promijeniGodineReferenca (int &$godine, int $value) : void {
    $godine = $value;
}

promijeniGodineReferenca($age, 50);

echo $age;

?>

-------------------------------------------------------------------------------------------------------------------------------------

zadatak:
imamo ulazni niz, treba vratitni novi niz sa brojevima vecim ili jednakom od 10,
treba uvecati brojeve puta 2 i sortirati ih od manjeg prema vecem


$ulazniNiz = array(2, 5, 10, 15, 20, 25, 30, 3, 7, 8, 12, 17);

foreach($ulazniNiz as $broj){
    if($broj >= 10){
        $broj = $broj * 2;
        $noviNiz[] = $broj;
        asort($noviNiz);
    }
}
var_dump($noviNiz);

-------------------------------------------------------------------------------------------------------------------------------------