<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('auth.forgotpasswordform');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $user = User::select('email')->where('email', $request->email)->first();
        if (!empty($user)) {

            try {
                DB::beginTransaction();
                $token = Str::random(64);
                DB::table('password_resets')->insert([
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
                $name = User::where('email', $request->email)->first()->name;
                Mail::to($request->email)->send(new ResetPassword($token, $name));
                DB::commit();
                return redirect()->back()->withSuccess('Một tin nhắn được gửi đến email của bạn');
            } catch (\Exception $err) {
                DB::rollBack();
                return redirect()->back()->withErrors($err->getMessage());
            }
        } else {
            return redirect()->back()->withErrors('Email chưa được đăng ký');
        }
    }

    public function checkTimeOut($createdTokenTime)
    {
        if(time() - strtotime($createdTokenTime) <= 60*5) {
            return true;
        } 
        return false;
    }
    
    public function showRecoveryPasswordForm($token)
    {
        $createdToken = DB::table('password_resets')->where('token', $token)->first();
        if(!empty($createdToken)) {
            if($this->checkTimeOut($createdToken->created_at)){
                return view('auth.resetpasswordform', ['token' => $token]);
            } else {
                return view('auth.resetpasswordform');
            }
        }
        return abort(404);
    }

    public function submitRecoveryPasswordForm(ResetPasswordRequest $request)
    {
        $createdToken = DB::table('password_resets')->where([
                'token' => $request->token
            ])->first();
        
        if(!empty($createdToken)) {
            if($this->checkTimeOut($createdToken->created_at)){
                try{
                    DB::beginTransaction();
                    $email = $createdToken->email;
                    $user = User::where('email', $email)->update(['password' => Hash::make($request->password)]);
                    DB::table('password_resets')->where(['email' => $request->email])->delete();
                    DB::commit();
                } catch(\Exception $err) {
                    DB::rollBack();
                    return redirect()->back()->withErrors($err->getMessage());
                }
                return redirect()->route('auth.login.get')->with('success', 'Mật khẩu đã được thay đổi! Đăng nhập ngay');
            } else {
                return view('auth.resetpasswordform');
            }
        }
        return abort(404);
    }
}
