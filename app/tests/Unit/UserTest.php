<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
//        $this->assertTrue(true);
        $responce = $this->get('/');
        $responce->assertOk();
    }
}
