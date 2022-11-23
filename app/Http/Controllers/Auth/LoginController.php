<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider(Request $request) // 
    {
        $usu = \App\Models\User::where('email',$request['email'])->first(); 

      if ($usu==null) { 
        $usu = new \App\Models\User;
        $usu['name'] = $request['name'];
        $usu['email'] = $request['email'];

        if ($usu->save()) {
         \Auth::loginUsingId($usu->id);
        return true;
        }else{
         return false;
        }
    }else{
     \Auth::loginUsingId($usu->id);
     return true;
   }
    }
  public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        dd($user);


        // $user->token;
    }

    

}
