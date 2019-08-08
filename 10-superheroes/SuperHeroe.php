<?php

class SuperHeroe
{
    public $name;
    public $power;
    public $identity;
    public $universe;

    //Un attribut statique est conservé par toutes les instances
    public static $heroes=[];

    public function __construct($name = null, $power = null, $identity = null, $universe = null)
    {
        $this->name = $name;
        $this->power = $power;
        $this->identity = $identity;
        $this->universe = $universe;
        //$this représente le superHeroe qui vient d'être crée
        self::$heroes[] = $this;
    }

    public function getRealIdentity()
    {
        return "l'identité réelle de Hulk est " .$this->identity;
    }

    public function getUniverse()
    {
        return $this->name. "fait partie de l'univers " .$this->universe;
    }

    /**
    * La fonction doit être appelée sans avoir une instance de SuperHeroe
    */
    public static function all()
    {
        //Self est la meme chose que superHeroe
        //Les :: permettent d'accéder à un attribut statique
        return self::$heroes;
    }

    /**
     * Cette fonction permet d'assigner des valeurs aux attributs de l'objet
     *
     * @return void
     */
    public function hydrate($data)
    {
        $this->name       =trim($data['name']);
        $this->power      =trim($data['power']);
        $this->identity   =trim($data['identity']);
        $this->universe   =trim($data['universe']);
    }

    /**
     * Permet d'enregistrer le héros en base de données 
     *
     * @return void
     */
    public function save()
    {
        //Ici ma requete SQL
        //Connexion à la BDD
        $db = new PDO('mysql:host=localhost;dbname=superheroes;charset=utf8', 'root','',[PDO::ATTR_ERRMODE => PDO:: ERRMODE_WARNING]);


        $q = $db->prepare ("INSERT INTO superheroe (`name`,`power`,`identity`,`universe`) VALUES (:name,:power,:identity,:universe)");
    
                $q->bindValue(':name', $this->name); //bindValue c'est quand on met une valeure, bindParam c'est quand il faut mettre une variable. bindValue il prend aussi les variables donc t'embete pas et met Value!
                $q->bindValue(':power', $this->power);
                $q->bindValue(':identity', $this->identity);
                $q->bindValue(':universe', $this->universe);
                
        return $q->execute();
    }
}

