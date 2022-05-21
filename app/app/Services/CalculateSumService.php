<?php

namespace App\Services;

use Exception;

class CalculateSumService
{
    /**
     * @throws Exception
     */
    public function start(array $data, $method = null)
    {
        if (method_exists($this, $method)) {
            return $this->$method($data['a'], $data['c']);
        }
        throw new Exception('method not found!!', 404);
    }

    public function plus(int $a, int $c): int
    {
        return intval($a + $c);
    }

    public function minus(int $a, int $c): int
    {
        return intval($a - $c);
    }
}
