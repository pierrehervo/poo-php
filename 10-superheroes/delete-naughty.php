<?php

require_once 'config/autoload.php';

//Récuperer l'ID du héro
$id = $_GET['id'] ?? null;

//On supp le vilain
$superNaughty = new SuperNaughty();
$superNaughty->delete($id);

//Redirection à la liste des heros
header("location: list-naughty.php");
exit;