<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller{
    public function index(){
        $roles = Role::all();
        return view('role.list', compact('roles'));
    }

    public function create(){
        return view('role.create');
    }

    public function store(Request $request){
        dd($request->all());
    }

    public function show($id){
        return view('role.show');
    }

    public function edit($id){
        return view('role.edit');
    }

    public function update(Request $request, $id){
        dd($request->all());
    }

}
