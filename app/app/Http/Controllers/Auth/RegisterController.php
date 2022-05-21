<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Auth\VerifyMail;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'alpha_dash', 'min:8', 'confirmed'],
        ]);
    }

//    protected function create(array $data): User
//    {
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
//        ]);
//    }
    //---------------------email---------------------------------------------

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verify_token' => Str::random(),
            'status' => User::STATUS_ACTIVE,
        ]);

        //----------------------------создание роли user---------------
//        $role = Role::create([
//            'name' => 'user',
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now(),
//        ]);
        //----------------------------назначение роли user-------------
//        $user->assignRole($role);
        $user->assignRole('user');
        //----------------------------------------------------------

        Mail::to($user->email)->send(new VerifyMail($user));

        return $user;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($this->create($request->all())));

        return redirect()->route('login')
            ->with(
                'success',
                'Check your email and click on the link to verify.'
            );
    }

    public function verify($token)
    {
        if (!$user = User::where('verify_token', $token)->first()) {
            return redirect()->route('login')
                ->with('error', 'Sorry your link cannot be identified.');
        }

        $user->status = User::STATUS_ACTIVE;
        $user->verify_token = null;
        $user->save();
        $this->guard()->login($user);

        return redirect()->route('home')
            ->with('success', 'Your e-mail is verified! Welcome!!');
    }
    //-----------------------------------------------------------------------
}
