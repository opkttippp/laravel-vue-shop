<?php

namespace Tests\Feature;

use App\Jobs\Worker\SendRegistrationMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class RegisterTest extends TestCase
{
    use WithFaker;

    public function testExample()
    {

        $response = $this->get('/');

        $response->assertStatus(200);

        $name = 'dolly';
//        Mail::fake();
//        $this->post('/register', [
//
//            'name' => $name,
//            'email' => $this->faker()->email,
//            'password' => $name
//
//        ]);
//        Mail::assertSent(SendRegistrationMail::class);
//        $this->assertDatabaseHas('users', [
//            'name' => $name
//        ]);
    }
}
