<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function getLogin()
    {
        return view('Admin.login');
    }
    function postLogin(Request $req)
    {
        $vali = $req->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Chưa nhập email',
            'password.required' => 'Chưa nhập password'
        ]);
        if (Auth::attempt(['email' => $vali['email'], 'password' => $vali['password']])) {
            return redirect('dashboard');
        } else {
            return redirect('login')->with('thongbao', 'Đăng nhập không thành công');
        }
    }
    function getProfileUser()
    {
        $user = Auth::user();
        return view('Admin.User.sua', compact('user'));
    }
    function getDashboard()
    {
        $user = Auth::user();
        return view('admin.dashboard', compact('user'));
    }
    function getLogout()
    {
        Auth::logout();
        return redirect('login');
    }
}
