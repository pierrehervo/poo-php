<?php
namespace Parking\Pro;

use Parking\Motorcycle;

class Truck
{
    public function __construct()
    {
        $this->cars = [
            new \Parking\Car (),
            new Motorcycle ()
        ];
    }
}