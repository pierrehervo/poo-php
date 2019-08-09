<?php

class Database
{
    public static $pdo;

    public function __get()
    {
        if (null === self::$pdo){//On s'assure que la connexion à la bdd se fait qu'une seule fois 
        self::pdo = new PDO('mysql:host=localhost;dbname=superheroes;charset=utf8', 'root','',[PDO::ATTR_ERRMODE => PDO:: ERRMODE_WARNING]);
        }
        return self::$pdo;
    }
}