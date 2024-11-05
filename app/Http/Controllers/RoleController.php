<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller{
    public function index(){
        $roles = Role::all();
        return view('roles.list', compact('roles'));
    }

    public function create(){
        return view('roles.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:roles,name|string|max:255',
            'status' => 'required|integer'
        ]);

         Role::create([
            'name' => $request->name,
            'status' => $request->status
        ]);

        return redirect('roles')->with('success', 'Role created successfully!');
    }

    public function show($id){
        $role = Role::findOrFail($id);
        return view('roles.show', compact('role'));
    }

    public function edit($id){
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,'.$id,
            'status' => 'required|integer'
        ]);
        $role = Role::findOrFail($id);
        if(!empty($role)){
            $role->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            return redirect('roles')->with('success', 'Role updated successfully');
        }else return redirect('roles')->with('error', 'Role not found');
    }

}
