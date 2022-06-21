<?php

namespace App\Facade;

use App\Components\SuperComponent;
use Illuminate\Support\Facades\Facade;

class SuperFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SuperComponent::class;
    }

}
