<?php 
namespace Geometry;

class Square extends Rectangle
{
    public function __construct($height)
    {
        //On appelle le constructeur du rectangle 
        parent::__construct($height, $height);
    }


}