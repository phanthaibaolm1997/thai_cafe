<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    // login khach hang
	public function getLogin(Request $request){
		return view('layouts.admin.contents.login');
    }
    
    public function Authentication(Request $request) {
		$credentials = $request->only('email', 'password');
		if (Auth::guard('nguoi_dung')->attempt($credentials)) {
            $nd_id = Auth::guard('nguoi_dung')->user()->nd_id;
            $email = $request->input('email');
			$request->session()->put('session_email',$email);
            $request->session()->put('session_id',$nd_id);
			return redirect()->route('admin');
		}
		return redirect()->back()->with('failed', "Đăng nhập thất bại! Sai tài khoản hoặc mật khẩu");
    }
    
    public function logout(){
		Auth::logout();
		Session::flush();
		return redirect()->route('login');
	}
}
