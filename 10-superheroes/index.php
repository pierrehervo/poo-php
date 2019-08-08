<?php

/**
 * 1)
 * Créer une classe SuperHeroe avec les attributs name power identity et universe.
 */
require_once 'SuperHeroe.php';

$ironMan = new SuperHeroe();
$ironMan->name = 'Iron Man';
$ironMan->power = 'Riche';
$ironMan->identity = 'Tony Stark';
$ironMan->universe = 'Marvel';

$captainAmerica = new SuperHeroe('Captain America', 'Force', 'Steve Rogers', 'Marvel');
$hulk = new SuperHeroe('Hulk', 'Force', 'Bruce Banner', 'Marvel');
$batman = new SuperHeroe('Batman', 'Riche', 'Bruce Wayne', 'DC');
$spiderman = new SuperHeroe('SpiderMan','Souple','Peter Parker','Marvel');

echo $hulk->getRealIdentity();// L'identité réelle de Hulk est Bruce Banner
echo $hulk->getUniverse(); // Hulk fait partie de l'univers Marvel

$heroes = [$ironMan, $captainAmerica, $hulk, $batman];
var_dump($heroes);

var_dump(SuperHeroe::all());

/**
 * 2)
 * Créer la base de données : superheroes
 * Crer la table: superheroe
 * Crer les colonnes: name, power, identity et universe
 */
/**
 * 3)
 * Créer une connexion avec la base de données en utilisant PDO
 * Faire une première requête pour inserer le héros suivant:Iron man
 */

//Connexion avec PDO
$db = new PDO('mysql:host=localhost;dbname=superheroes;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO:: ERRMODE_WARNING]);//le tableau c'est des options qui permet de voir les erreurs mySQL
  


//La requête pour inserer le héros

$sql = "INSERT INTO superheroe (`name`,`power`,`identity`,`universe`) VALUES (:name,:power,:identity,:universe)";
$q = $db->prepare($sql);

        $q->bindValue(':name', 'Ironman'); //bindValue c'est quand on met une valeure, bindParam c'est quand il faut mettre une variable. bindValue il prend aussi les variables donc t'embete pas et met Value!
        $q->bindValue(':power', 'Riche');
        $q->bindValue(':identity', 'Tony Stark');
        $q->bindValue(':universe', 'Marvel');
$q->execute();