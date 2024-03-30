<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
