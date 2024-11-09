
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