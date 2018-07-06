<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Mail;
use Config;
use App;
use Session;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        App::setLocale(Session::get('locale'));
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'register_code' => str_random(20),
        ]);

        //send verification mail to user
        //---------------------------------------------------------
        $data['register_code']  = $user->register_code;

        Mail::send('emails.validate', $data, function($message) use ($data)
        {
            $message->from(Config::get('constants.options.no_reply'), "Coexperiences");
            $message->subject("Register to Coexperiences");
            $message->to($data['email']);
        });

        Mail::send('emails.register',['name'=>$user['name'], 'email'=>$user['email'] ], function($message) use ($data){
            $message->from(Config::get('constants.options.no_reply'), "Coexperiences");
            $message->subject("Register to Coexpereiences");
            $message->to(Config::get('constants.options.register_to_mail'));
        });

        return $user;
    }

}
