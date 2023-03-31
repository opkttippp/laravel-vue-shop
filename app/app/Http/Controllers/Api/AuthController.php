<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;
    protected $loginType;

    public function register(Request $request)
    {
        $requestData = $request->all();
        $validator = Validator::make($requestData, [
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $requestData['name'],
            'email' => $requestData['email'],
            'password' => Hash::make($requestData['password']),
        ]);
        $user->assignRole(Role::findByName('user'));
        event(new Registered($user));

        $this->guard()->login($user);
        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        return response(
            ['user' => Auth::user(), 'access_token' => $accessToken],
            200
        );
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|max:45|string',
            'password' => 'required|max:45|string'
        ]);

        $credentials = [
            $this->checkLoginInput() => $request->login,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            return response()->json(
                [
                    'user' => Auth::user(),
                    'access_token' => Auth::user()->createToken(
                        'authToken'
                    )->accessToken
                ],
                200
            );
        } else {
            return response()->json([
                'errors' => 'Unauthorised',
                'message' => 'These credentials don\'t match our records.',
            ], 401);
        }
    }

    public function me(Request $request)
    {
        $user = $request->user();

        return response()->json(['user' => $user], 200);
    }

    protected function checkLoginInput()
    {
        $inputData = request()->get('login');

        return filter_var($inputData, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
}
