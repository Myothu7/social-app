<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
   
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'confirmed'],
    //         // 'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }
    
    protected function create(Request $request)
    {
        $name = trim($request->first_name) ." ". trim($request->last_name);
        User::create([
            'name' => $name,
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'remember_token' => $request->_token
        ]);

        return back()->with('msg', 'Registration successfully!');
    }

    // protected function store(Request $request)
    // {
    //     $name = trim($request->first_name) ." ". trim($request->last_name);
    //     User::create([
    //         'name' => $name,
    //         'email' => $request['email'],
    //         'password' => Hash::make($request['password']),
    //         'birthday' => $request->birthday,
    //         'gender' => $request->gender,
    //         'remember_token' => $request->_token
    //     ]);

    //     return back()->with('msg', 'Registration successfully!');
    // }
}
