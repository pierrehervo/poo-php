<?php

class Cat
{
    var $name;
    var $type;
    var $fur;

    function cry()
    {
        return 'Miaou !';
    }

    function eat()
    {
        return $this->name . ' mange';
    }
}


// Bianca et Mina sont deux objets, et deux instances de la classe Cat
$bianca = new Cat();
$mina = new Cat();

// On peut affecter des valeurs aux propiétés
$bianca->name = 'Bianca';
$bianca->type = 'Chat de gouttière';
$bianca->fur = 'Blanc';

// On peut afficher la valeur d'un propriété
echo 'Mon chat s\'appelle ' . $bianca->name . ' et il fait ' . $bianca->cry() . ' <br> '; 


$mina->name = 'Mina';
echo $mina->name . ' peut aussi faire ' . $mina->cry() . ' <br>';

var_dump($bianca);
echo '<br>';

var_dump($mina);
echo '<br>';

echo $bianca->eat();
echo '<br>';

echo $mina->eat();
