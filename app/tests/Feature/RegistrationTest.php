<?php

namespace Tests\Feature;

use App\Jobs\Worker\SendRegistrationMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class RegistrationTest extends TestCase
{
    use WithFaker;

    public function test_example()
    {

        $response = $this->get('/');

        $response->assertStatus(200);

        $name = 'tttolll';
        Mail::fake();
        $this->post('/login', [

            'name' => $name,
            'email' => $this->faker()->email,
            'password' => 'admin'

        ]);
        Mail::assertSent(SendRegistrationMail::class);
        $this->assertDatabaseHas('users', [
//            'name' => 'guest'
        ]);
    }
}
