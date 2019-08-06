<?php

class Cat 
{
    private $name;
    private $type;
    private $fur;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}