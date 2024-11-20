<?php
// nacrt objekta (razred, klasa)

class Car{
    //svojstva (Atributi)
    public $brand;
    public $model;

}

$car = new Car();
$car ->brand = 'Audi';

$car1 = new Car();
$car1 -> brand = 'BMW';

$car2 = $car1;

$car2 -> model = 'X5';

$car3 = clone $car1;
$car3 -> model = 'X6';


var_dump($car, $car1, $car2, $car3);









?>