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

    public function loginPost(Request $request)
    {
        $data = $request->only('username','password');
        if(Auth::attempt($data)){
            return redirect('/')->with('isLogin',true);
        } else {
            return redirect('/user/login');
        };
    }
}
