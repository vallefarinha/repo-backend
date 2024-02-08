<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthManagerController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect(route(name:'about'));
        }
        return view('login');
    }

    public function register(){
        if(Auth::check()){
            return redirect(route(name:'login'));
        }
        return view('register');

    }

    public function loginPost(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

    $credentials = $request->only(['email', 'password']);
        if(Auth::attempt($credentials)){
            return redirect()->intended(route(name:'about'));
        }
        return redirect(route(name:'login'))->with("error", "Login not valid");
    }

    public function registerPost(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        if(!$user){
            return redirect(route(name:'register'))->with("error", "Register not valid");
        }
        return redirect(route(name:'login'))->with("success", "Success");;
    }


    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route(name:'login'));
    }

}