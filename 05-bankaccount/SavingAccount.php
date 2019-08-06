<?php

class SavingAccount extends BankAccount01
{
    public function applyInterest($rate)
    {
        $this->balance *= 1 + $rate /100;
        //On rajoute la ligne du bas pour arrondir
        $this->balance = round($this->balance, 2);
    }
}