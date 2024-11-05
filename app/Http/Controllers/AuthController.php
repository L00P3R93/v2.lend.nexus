<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller{
    public function login(Request $request){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        dd($request->all());
    }

    public function createUser(Request $request){}
}
