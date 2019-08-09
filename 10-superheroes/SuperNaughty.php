<?php

class SuperNaughty
{
    public $name;
    public $hobby;
    public $identity;
    public $universe;

    //Un attribut statique est conservé par toutes les instances
    public static $heroes=[];

    public function __construct($name = null, $hobby = null, $identity = null, $universe = null)
    {
        $this->name = $name;
        $this->hobby = $hobby;
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
        $this->hobby      =trim($data['hobby']);
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

        $q = Database::get()->prepare ("INSERT INTO supernaughty (`name`,`hobby`,`identity`,`universe`) VALUES (:name,:hobby,:identity,:universe)");
    
                $q->bindValue(':name', $this->name); //bindValue c'est quand on met une valeure, bindParam c'est quand il faut mettre une variable. bindValue il prend aussi les variables donc t'embete pas et met Value!
                $q->bindValue(':hobby', $this->hobby);
                $q->bindValue(':identity', $this->identity);
                $q->bindValue(':universe', $this->universe);
                
        return $q->execute();
    }

    /**
     * Permet de modifier le héros
     */
    public function update($id)
    {
        $q = Database::get()->prepare ("UPDATE supernaughty SET `name` =:name ,`hobby` =:hobby, `identity` =:identity ,`universe` =:universe WHERE id =:id");
    
                $q->bindValue(':name', $this->name); //bindValue c'est quand on met une valeure, bindParam c'est quand il faut mettre une variable. bindValue il prend aussi les variables donc t'embete pas et met Value!
                $q->bindValue(':hobby', $this->hobby);
                $q->bindValue(':identity', $this->identity);
                $q->bindValue(':universe', $this->universe);
                $q->bindValue(':id', $id);
                
        return $q->execute();
    }

    /**
     * Permet de supprimer un héros 
     */
    public function delete($id)
    {

        //On supp le vilain
        $q = Database::get()->prepare ("DELETE FROM supernaughty WHERE  id=:id");

            $q->bindValue(':id', $id, PDO::PARAM_INT);

        return $q->execute();
    }

    /**
     * Permet de mrécuperer in vilain en particulier par son ID
     */
    public static function find($id)
    {
        $q = Database::get()->prepare('SELECT * FROM supernaughty WHERE id = :id');  
            $q->bindValue('id', $id);
            $q->execute();
            //$superHeroe = $q->fetch(PDO::FETCH_OBJ);
            
            // Le setFetchMode ici permet de retourner une instance de SuperHeroe avec fetch plutôt qu'une instance de StdClass
            $q->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, SuperNaughty::class);
            return $q->fetch(); // le fetch fait un new SuperHeroe(); grâce à PDO::FETCH_CLASS
            //var_dump($superHeroe);

    }

    /**
     * Permet de récuperer tous les supers vilainns
     */
    public static function findAll()
    {
        
        $q = Database::get()->query ("SELECT id, name, hobby, identity, universe FROM supernaughty");
    
        $q->execute();

        return $q->fetchAll(PDO::FETCH_OBJ);
    }
}