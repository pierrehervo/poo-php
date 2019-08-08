<?php

class Annuaire
{
    private $contacts = [];

    

    public function compter()
    {
        echo count($this->contacts);
    }

    public function addContact(Contact $contact)
    {
        $this->contacts[] = $contact;
        return $this;
    }

    public function afficher ()
    {
        $html = '<ul>';

        foreach ($this->contacts as $contact){
            $html .="<li> $contact->prenom $contact->nom, Tel:  $contact->numero, Mail: $contact->email</li>";
        }
        $html = '</ul>';
        return $html;
    }
}