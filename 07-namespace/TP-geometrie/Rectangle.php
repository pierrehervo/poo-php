<?php
namespace Geometry;

class Rectangle
{
    protected $width ;
    protected $height ;

    public function __construct($width, $height)
    {
        $this-> width = $width;
        $this-> height = $height;

    }

    public function area()
    {
        return $this->width * $this->height;
    }
    public function perimeter()
    {
        return 2*($this->width + $this->height);
    }
}