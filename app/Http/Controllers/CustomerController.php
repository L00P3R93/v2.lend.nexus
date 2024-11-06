<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller{
    public function index(){
        $customers = Customer::with('product')->get();
        return view('customers.list', compact('customers'));
    }

    public function create(){
        return view('customers.create');
    }

    public function store(Request $request){
        dd($request->all());
    }

    public function show($id){
        $customer = Customer::findOrFail($id);
        return view('customers.view', compact('customer'));
    }

    public function edit($id){
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id){
        dd($request->all());
    }
}
