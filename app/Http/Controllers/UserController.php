<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index')->with('isLogin', false);
    }

    public function loginPost(Request $request)
    {
        $data = $request->only('username','password');
        if(Auth::attempt(credentials: $data)){
            return redirect()->route('admin.index')->with('isLogin',true);
        } else {
            return redirect('/user/login');
        };
    }
}
