<?php

/**
 * On veut réaliser un annuaire de contacts.
 * On a une classe Annuaire qui pourra contenir des contacts On pourra compter le nombres de contacts.
 * On aura une classe Contact qui represente qlqu'un dans notre annuaire. Un contact posséde un nom, un prénom, un telephone et un mail.
 */
require_once 'Annuaire.php';
require_once 'Contact.php';

 $annuaire = new Annuaire();
 echo 'Notre  annuaire contient ' .$annuaire->compter() . 'contacts.';//0
 $contact1 = new Contact ('Mota', 'Matthieu', '0600000000', 'matthieu@boxydev.com');
 $contact2 = new Contact ('Random', 'Jean', '0600000000', 'jean@boxydev.com');
 $annuaire
    ->addContact($contact1)
    ->addContact($contact2)
;

echo 'Notre annuaire contient' .$annuaire->compter() . ' contacts.';//2
echo $annuaire->afficher();