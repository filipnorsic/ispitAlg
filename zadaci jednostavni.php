
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