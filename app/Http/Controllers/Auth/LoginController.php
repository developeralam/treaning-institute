<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     public function showLoginForm()
    {
        return view('auth.login');
    }

     public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
        return $this->sendFailedLoginResponse($request);
    }
    // protected function credentials(Request $request)
    // {
    //     $admin = User::where('email',$request->email)->first();
    //     if (count($admin)) {
    //         if ($admin->status == 0) {
    //             return ['email'=>'inactive','password'=>'You are not an active person, please contact Admin'];
    //         }else{
    //             return ['email'=>$request->email,'password'=>$request->password,'status'=>1];
    //         }
    //     }
    //     return $request->only($this->username(), 'password');
    // }
        

   
}