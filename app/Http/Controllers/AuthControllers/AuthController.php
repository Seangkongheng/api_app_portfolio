<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('admin.login.login');
    }
    public function store( Request $request){
        
        $request->validate([
            'email'=>'required',
            'password'=>'required',

        ]);
        $credentails=$request->only('email','password');
        if(Auth::attempt($credentails)){
            return redirect()->route('dashboard.index');
        }
        return redirect()->route('login.index')->with('error','Password or email incorrect');
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login.index');
    }
    
}
