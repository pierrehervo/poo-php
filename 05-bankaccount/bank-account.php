<?php

/**
 * Nous allons créer un système de gestion de compte en banque en POO
 * 
 * Nous avons d'abord le compte en banque classique représenté par la classe BankAccount
 * Il possède un identifiant (int), un propriétaire (string) et un montant (float).
 * On devra définir l'identifiant et le propriétaire dans le constructeur. Le montant pourra être défini dans le constructeur de manière optionnelle
 */

 require_once 'bankAccount01.php';
 require_once 'Savingaccount.php';

 $bankAccount01 = new BankAccount(123456, 'Mathieu');//Mathieu a 0 sur son compte


 echo 'montant sur le compte: '. $bankAccount01->getBalance() .'<br />';//Renvoie 0
 $bankAccount01->depositMoney(1000);//Mathieu a 1000 sur son compte
 echo 'montant sur le compte: '. $bankAccount01->getBalance() .'<br />';//Renvoie 1000
 $bankAccount01->withdrawMoney(1000);//Mathieu a 0 sur son compte
 echo 'montant sur le compte: '. $bankAccount01->getBalance() .'<br />';

 //On renvoie uen erreur si le montant du compte tombe en dessous de 0
 $bankAccount01->withdrawMoney(1000);
 $bankAccount01->depositMoney(-2000);

 /**
  * On va ajouter un systeme de livret qui va hériter d'un compte standard (extends)
  */
  $savingAccount01 = new SavingAccount(1234567, 'Mathieu');//Mathieu a 0 sur son compte
  $savingAccount01->deposityMoney(1000); //Mathieu a 1000 sur son livret
  $savingAccount01->applyInterest(0.75);//Augmante le montant du livret de 0.75%
  $savingAccount01->withdrawMoney(1000);//Mathieu a 7.5sur son livret
  echo $savingAccount01->getBalance();//Renvoie 7.5