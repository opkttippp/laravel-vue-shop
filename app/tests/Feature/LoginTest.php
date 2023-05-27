<?php

namespace Tests\Feature;

use App\Jobs\Worker\SendRegistrationMail;
use App\Models\Category;
use App\Models\User;
use Faker\Factory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Exception;
use Faker\Generator;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

class LoginTest extends TestCase
{
    use WithFaker;
    public function setUp(): void
    {
        parent::setUp();
        $this->faker = Factory::create();
        Artisan::call('migrate:refresh');
    }

    /**
     * @throws Exception
     */
    public function __get($key)
    {
        if ($key === 'faker') {
            return $this->faker;
        }
        throw new Exception('Unknown Key Requested');
    }
    public function testAutoriz()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);


        $user = User::factory()->create([
            'password' => Hash::make('laravel'),
        ]);

        $this->assertDatabaseHas('users', [
            'name' => $user->name
        ]);

        $this->json('get', "api/user/$user->id")
            ->assertStatus(ResponseAlias::HTTP_OK)
        ->assertExactJson(
            [
                    'data' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'lastname' => $user->lastname,
                        'address' => $user->address,
                        'phone' => $user->phone,
                        'email' => $user->email
                    ]
                ]
        );

        $category = Category::factory(3)->create([
        ]);

//        $this->json('get', 'api/user', $user)
////            ->assertStatus(ResponseAlias::HTTP_CREATED)
//            ->assertJsonStructure(
//                [
//                    'data' => [
//                        'id',
//                        'name',
//                        'last_name',
//                        'email',
//                        'created_at',
//                    ]
//                ]
//            );





//        $response = $this->actingAs($user, 'web')->post('/login', [
//                'name' => $user->name,
//                'password' => $user->password,
//            ]);
//
//        $this->assertAuthenticatedAs($user);
//        $response->assertRedirect('/');
//        $response->assertStatus(200);
    }
}
