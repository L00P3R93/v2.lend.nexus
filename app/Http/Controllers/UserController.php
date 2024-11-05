<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{
    public function index(){
        $users = [];
        return view('users.list', compact('users'));
    }

    public function show($id){
        return view('users.view');
    }

    public function create(){
        return view('users.create');
    }

    public function createUser(Request $request){
        dd($request->all());
    }

    public function edit($id){
        return view('users.edit');
    }

    public function update(Request $request, $id){
        dd($request->all());
    }
}
