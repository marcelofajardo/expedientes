<?php

namespace App\Http\Controllers\Auth;

use App\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Socialite;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;




class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }

    public function fillLastLogin($user)
    {
       
    }

    protected function guard() {
        return Auth::guard('web');
    }

    public function login(Request $request)
    {
         
        if(Auth::user())
         {
         return Redirect::to('home');
         }
         
        $username = $request->username;
        $password = $request->password;

        //recogemos los campos del formulario y los guardamos en un array
         //para pasarselo al método Auth::attempt
         $userdata = array(
             'username' => $username,
             'password'=> $password,
         ); 
         
         //si los datos son correctos y existe un usuario con los mismos se inicia sesión
         //y redirigimos a la home

         if(Auth::attempt($userdata, true))
         {
           
            $usuario = User::where('username', $userdata['username'])->first();
        
            $this->guard()->login($usuario);
	    
            return Redirect::to('home');

         }else{
            //en caso contrario mostramos un error
            return Redirect::to('login')
                    ->with('mensaje_error', 'Tus datos son incorrectos')
                    ->withInput();
         
         }

         /*
        if ($this->validCredentials($userLdap, $password)) {

            $user = User::where('username', $username)->first();

            if (!$user)
                $user = $this->fillUser($username);
            else
                $this->fillLastLogin($user);

            $this->guard()->login($user);
            return redirect()->route('home');
        }
        else return redirect()->back();
        */
    }

    /**
     * @param $username
     *
     * @return User
     */
    public function fillUser($username)
    {
        $data = $this->search_user($username);

        $user = new User;

        $user->username = $this->getUsername($data);
        $user->name = $this->getGivenName($data);
        $user->email = $this->getEmail($data);
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->last_login = Carbon::now();

        $user->save();

        return $user;
    }


    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect('home');
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {

        try
        {
            $user = Socialite::driver($provider)->user();
        }
        catch(\Exception $e)
        {
            session()->flash('message', 'Cuenta no existe');
            return redirect('login');
        }

         $socialuser = User::where('email',$user->getEmail())->first();

         if($socialuser == NULL){
           session()->flash('message', 'Cuenta no existe');
           return redirect('login');
         }else{
           User::where('email',$user->getEmail())
                     ->update([
                       'social_name' => $user->getName(),
                       'email' => $user->getEmail(),
                       'social_id' => $user->getId(),
                       'avatar' => $user->getAvatar(),
                     ]);

           auth()->login($socialuser);
           return redirect()->To('home');

         }

    }
}
