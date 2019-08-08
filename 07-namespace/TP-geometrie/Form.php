<?php 

class Form
{
    protected $forms = [];

    public function add ($form)
    {
        $this->forms[] = $form;

        return $this;
    }

    public function area()
    {
        $area = 0;

        foreach ($this->forms as $form){
            $area += $form->area();
        }

        return $area;
    }

    public function perimeter()
    {
        $perimeter = 0;

        foreach ($this->forms as $form){
            $perimeter +=perimeter();
        }
        return $perimeter;
    }
}