<?php

class Contact
{
    public $nom;
    public $prenom;
    public $numero;
    public $mail;

    public function __construct($name, $prenom, $numero, $mail)
    {
     $this->name = $name;   
     $this->prenom = $prenom;   
     $this->numero = $numero;   
     $this->mail = $mail;   
    }
}