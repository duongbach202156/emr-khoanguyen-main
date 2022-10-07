<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(AuthRequest $request)
    {
        // dd($request->all());
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(isset($request->remember) && $request->remember == 'on' ){
            $remember = true;
        } else {
            $remember = false;
        }
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
 
            return redirect()->intended('emr');
        }
        return back()->withErrors('Tài khoản hoặc mật khẩu không chính xác.');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('auth.login.get');
    }
}
