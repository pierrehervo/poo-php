<?php

require_once 'Car.php';
/**
 * On vveut créer une classe voiture.
 * Une voiture possède 4roues, une couleur une marque et un modele (4attributs)
 * Une voiture roule et klaxonne (2méthodes)
 * On instanciera une foiture.
 */


$car = new Car();

$car->brand = "renault";
$car->model = "twingo";

echo $car->drive(); //"La renault twingo roule sur 4roues"
echo $car->klaxon(); //"La voiture rose klaxonne"

$car2 = new Car ('Alfa Roméo', '147');
var_dump($car2);