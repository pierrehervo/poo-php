<?php 

class Character
{
    protected $name;
    protected $health = 100;
    protected $strenght = 10;
    protected $mana = 10;

    public function __construct($name)
    {
     $this->name = $name;   
    }
    
    public function attack(Character $character)
    {
        //On va changer la vie du perso attaqué
        $character->health -=  $this->strenght;
    }
}