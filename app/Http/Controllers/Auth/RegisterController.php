<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function redirectTo()
    {   
        $plan_id = Session::get('plan_id');
        if ($plan_id == 2 || $plan_id == 3) {
            return route('subscribe', $plan_id);
        }
        return RouteServiceProvider::HOME;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data, [
                     'name' => [
                         'required',
                         'string',
                         'max:255',
                     ],
                     'email' => [
                         'required',
                         'string',
                         'email',
                         'max:255',
                         'unique:users',
                     ],
                     'password' => [
                         'required',
                         'string',
                         'min:8'
                     ],
                 ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return \App\User
     */
    protected function create(array $data)
    {
        $cookie = Cookie::get('referral');
        $referred_by = $cookie ? \Hashids::decode($cookie)[0] : null;
        $user   = User::create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'type' => 'company',
                'lang' => \App\Utility::getValByName('default_language'),
                'created_by' => 1,
                'referred_by' => $referred_by
            ]
        );
        $role_r = Role::findByName('company');

        return $user->assignRole($role_r);
    }

    public function showRegistrationForm($lang = '')
    {
        if($lang == '')
        {
            $lang = \App\Utility::getValByName('default_language');
        }

        \App::setLocale($lang);

        return view('auth.register', compact('lang'));
    }
}
