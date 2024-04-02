<?php

namespace App\Http\Controllers;

use App\Mail\UserResetPassEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Session;
class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // làm gì đó nếu đăng nhập thành công
                return redirect('/customers');
            } else {
                // đăng nhập không thành công
                Session::flash('error', 'Sai mật khẩu hoặc địa chỉ email');
                return redirect()->route('login');
            }
        }
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function forgotPassword(Request $request) {
        if ($request->isMethod('POST')) {
            $email = $request['email'];
            $token = Hash::make($email); // tạo token từ địa chỉ email
            Mail::to($email) -> send(new UserResetPassEmail($token));
        } else {
            return view('auth.forgot-password');
        }
    }

    public function resetPassword(Request $request) {
        $users = User::all();
        foreach ($users as $user) {
            var_dump(Hash::check($user->email, $request->token));
            if (strcmp(Hash::make($user->email), $request->token)) {
                $user->where('id', $user->id)->update([
                   'password' => Hash::make('12345678')
                ]);
                break;
            }
         }
    }
}
