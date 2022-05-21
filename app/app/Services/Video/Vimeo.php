<?php

namespace App\Services\Video;

use App\Contracts\Video\VideoHosting;

class Vimeo implements VideoHosting
{
    protected int $rand;
    protected string $token;

    public function __construct($token)
    {
        $this->token = $token;
        $this->rand = rand(0, 10000);
    }

    public function showMeString(): string
    {
        return 'Vimeo - ' . $this->rand. ' - token - '. $this->token;
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
        return $this->showMeString();
    }
}
