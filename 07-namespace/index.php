<?php

require_once 'Car.php';
require_once 'Motorcycle.php';
require_once 'Truck.php';

spl_autoload_register(function ($class) {
    
    $classArray = explode('\\', $class) ;
    $classFile = end($classArray);

    require_once $classFile . '.php';
});
//Importe la classe Parking\Motorcycle
use Parking\Motorcycle;

$car = new Parking\Car();
$motorcycle = new Motorcycle();//Du coup la j'ai pas besoin d'écrire Parking vu que je l'ai importé plus haut
$truck = new Parking\Pro\Truck();

var_dump($car);
var_dump($motorcycle);
var_dump($truck);