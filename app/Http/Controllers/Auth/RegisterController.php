<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Uep;
use App\Rol;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $roles = Rol::all()->pluck('nombre', 'id');
        $ueps = Uep::all()->pluck('nombre', 'id');;
        return view('auth.register', 
            [
                'roles' => $roles,
                'ueps' => $ueps,
            ]);
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
            'nombre'      => 'required|string|max:255',
            'documento'   => 'nullable|string|max:255',
            'email'       => 'required|string|email|max:255|unique:users',
            'password'    => 'required|string|min:6|confirmed',
            'rol_id'      => 'nullable|exists:roles,id',
            'uep_id'      => 'nullable|exists:uep,id',
        ]);
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'nombre' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = $request;

        $user = User::create([
            'nombre' => $data['nombre'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        
        auth()->login($user);
        
        return redirect()->to('/home');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
//        dd($user);

        return User::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'rol_id' => $data['rol_id'],
            'uep_id' => $data['uep_id'],
        ]);
    }
}