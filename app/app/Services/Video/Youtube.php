<?php

namespace App\Services\Video;

use App\Contracts\Video\VideoHosting;

class Youtube implements VideoHosting
{
    protected $rand;

    public function __construct()
    {
        $this->rand = rand(0, 10000);
    }

    public function showMeYouString()
    {
        return 'Youtube - ' . $this->rand;
    }


    public function getVideoHeight()
    {
        // TODO: Implement getVideoHeight() method.
    }

    public function getVideoWidth()
    {
        // TODO: Implement getVideoWidth() method.
    }

    public function showString()
    {
        return $this->showMeYouString();
    }
}
