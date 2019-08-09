<?php
require_once 'Database.php';
//Connexion BDD
$db = Database::get();


//Récuperer l'ID du héro
$id = $_GET['id'] ?? null;

//On supp le héro
$q = $db->prepare ("DELETE FROM superheroe WHERE  id=:id");
$q->bindValue(':id', $id, PDO::PARAM_INT);
$q->execute();

//Redirection à la liste des heros
header("location: list.php");
exit;