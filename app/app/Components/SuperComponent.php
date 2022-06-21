<?php

namespace App\Components;

class SuperComponent
{
    protected string $super = 'Hello ';

    public function __construct($compo)
    {
        $this->super .= $compo;
    }
    public function getNames(){

        return $this->super;
    }
}
