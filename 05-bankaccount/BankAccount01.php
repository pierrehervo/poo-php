<?php

class bankAccount
{
    private $identifier;
    private $owner;
    protected $balance;

    public function __construct ($identifier, $owner, $balance= 0)
    {
        $this->identifier = $identifier;
        $this->owner = $owner;
        $this->balance = $balance;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function depositMoney($amount)
    {
        if ($amount < 0) {
            echo 'PAS DE DEPOT NEGATIF';
            return;//On arrête le code
        }
        return $this->balance +=$amount;
    }

    public function withdrawMoney ($amount)
    {
        if($this->balance < $amount){
            echo 'PAS DE RETRAIT!';
            return; //On arrete le code
        }

        return $this->balance -=$amount;
    }
}