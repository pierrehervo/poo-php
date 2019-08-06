<?php

class Hunter extends Character
{
    public function rangedAttack($character)
    {
        //le chasseur enlève 30pdv
        $character->health -= $this->strenght *3;
    }
}