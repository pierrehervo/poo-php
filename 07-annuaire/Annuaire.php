<?php

class Annuaire
{
    private $contacts = [];

    public function addContact(Contact $contact)
    {
     $this->contacts[] = $contact;

     return $this;
    }

    public function compter()
    {
        echo compter($this->contacts);
    }

    public function afficher()
    {
        
    }
}