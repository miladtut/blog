<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(){
        return view ('auth.register');
    }


    public function post_register(Request $request){
       $validations = $request->validate([
            'email' => ['required', 'email','unique:users'],
            'password' => ['required','min:6'],
            'name'=>['required']
                           ]);

        User::query ()->create ($validations);

        return redirect ()->route ('login');
    }


    public function login(){
        return view ('auth.login');
    }


    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function post_login(Request $request)
    {
        $credentials = $request->validate([
              'email' => ['required', 'email'],
              'password' => ['required'],
                                              ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route ('home');
        }

        return back()->withErrors([
              'email' => 'The provided credentials do not match our records.',
          ])->onlyInput('email');
    }

    public function logout(){
        Auth::logout ();
        return redirect ('/login');
    }
}
