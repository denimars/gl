<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class ControllerAuth extends Controller
{
    public function login(){
      if(Auth::check()){
        return redirect("/");
      }else{
        return view("auth.login");
      }
    }

    public function postLogin(Request $request){
      if(Auth::attempt(['user'=>$request->input('user'), 'password'=>$request->input('password')])){
        return redirect('/');
      }else{
        return view("auth.login");
      }
    }

    public function register(){
      //if(Auth::user()->status == "admin"){
        return view('auth.register');
      //}else{
        //return redirect('/');
      //}
    }

    public function postRegister(Request $request){
      User::create([
        'name'=>$request->input('name'),
        'user'=>$request->input('user'),
        'password'=>bcrypt($request->input('password')),
        'status'=>$request->input('status')
      ]);
      return redirect('/');
    }

    public function logout(){
      Auth::logout();
      return redirect('/');
    }
}
