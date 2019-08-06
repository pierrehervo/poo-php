<?php

class Game
{
    /**
     * Contient les joueurs de la partie
     *
     * @var array
     */
    private $players = [];

    /**
     * Permet de rajouter un joueur à la partie 
     *
     * @param [type] $player
     * @return void
     */
    public function addPlayer(Character $player)
    {
        //array_push($this->players, $player); ce qui est écrit en dessous c'est pareil 
        $this->players[] = $player;

        return $this;
    }
}