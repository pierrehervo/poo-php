<?php

class Car
{
    public $wheel= 4;
    public $color = 'rose';
    public $brand;
    public $model;

    public function __construct($brand = null, $model = null)
    {
        $this->brand = $brand;
        $this->model = $model;
    }
    public function drive()
    {
        return "La" .$this->brand.''.$this->model."roule sur".$this->wheel."roues.";
    }

    public function klaxon()
    {
        return "la voiture".$this->color."klaxonne.";
    }
}