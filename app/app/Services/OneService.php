<?php

namespace App\Services;

use App\Contracts\Video\VideoHosting;

class OneService
{
    protected VideoHosting $service;

    public function __construct(VideoHosting $service)
    {
        $this->service = $service;
    }

    public function show()
    {
        return $this->service->showString();
    }

}
