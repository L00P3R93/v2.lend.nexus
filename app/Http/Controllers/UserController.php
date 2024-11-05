<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller{
    public function index(){
        $users = User::with('role')->get(); // Eager load roles to avoid N+1 query issue
        return view('users.list', compact('users'));
    }

    public function show($id){
        return view('users.view');
    }

    public function create(){
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request){
        $request->validate([
            'fullName' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phoneNo' => 'required|string|max:255|unique:users',
            'role' => 'required|integer',
            'status' => 'required|integer'
        ]);

        $user = User::create([
            'name' => $request->fullName,
            'username' => $request->username,
            'email' => $request->email,
            'phoneNo' => $request->phoneNo,
            'role_id' => $request->role,
            'password' => Hash::make($request->username),
            'remember_token' => Str::random(40),
            'status' => $request->status
        ]);

        return redirect('users')->with('success', 'User created successfully!');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'fullName' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phoneNo' => 'required|string|max:255',
            'role' => 'required|integer',
            'status' => 'required|integer'
        ]);
        $user = User::findOrFail($id);
        if(!empty($user)){
            $user->update([
                'name' => $request->fullName,
                'username' => $request->username,
                'email' => $request->email,
                'phoneNo' => $request->phoneNo,
                'role_id' => $request->role,
                'status' => $request->status
            ]);
            return redirect('users')->with('success', 'User updated successfully!');
        }else return redirect('users')->with('error', 'User not found!');
    }
}
