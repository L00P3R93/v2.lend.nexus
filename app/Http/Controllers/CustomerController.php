<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Customer;
use App\Models\CustomerStatus;
use App\Models\Product;
use App\Models\Town;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller{
    public function index(){
        $customers = Customer::with('product')->get();
        return view('customers.list', compact('customers'));
    }

    public function showBank(){
        $customers = Customer::where('status', '!=', 6)->where('product_id', 1)->with('product')->get();
        return view('customers.bankers.list', compact('customers'));
    }

    public function showCivil(){
        $customers = Customer::where('status', '!=', 6)->where('product_id', 2)->with('product')->get();
        return view('customers.civil.list', compact('customers'));
    }

    public function create(){
        $products = Product::all();
        $banks = Bank::all();
        $towns = Town::with('county')->get();
        $states = CustomerStatus::all();
        return view('customers.create', compact('products', 'banks', 'towns', 'states'));
    }

    public function store(Request $request){
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "other_name" => "required",
            "idNo" => "required|unique:customers,idNo",
            "primaryPhone" => "required|unique:customers,primaryPhone",
            "work_email" => "required|unique:customers,work_email",
            "gender" => "required|integer",
            "dob" => "required|date",
            "product_id" => "required|integer",
            "bank_id" => "required|integer",
            "branch_id" => "required|integer",
            "job_type" => "required|integer",
            "business_address" => "required|string",
            "town_id" => "required|integer",
            "section" => "required|integer",
            "home_address" => "required|string",
            "loan_limit" => "required",
            "status" => "required|integer",
        ]);

        $customer = Customer::create([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "other_name" => $request->other_name,
            "idNo" => $request->idNo,
            "primaryPhone" => $request->primaryPhone,
            "secondaryPhone" => $request->secondaryPhone,
            "work_email" => $request->work_email,
            "gender" => $request->gender,
            "dob" => $request->dob,
            "product_id" => $request->product_id,
            "bank_id" => $request->bank_id,
            "branch_id" => $request->branch_id,
            "job_type" => $request->job_type,
            "business_address" => $request->business_address,
            "town_id" => $request->town_id,
            "section" => $request->section,
            "home_address" => $request->home_address,
            "comments" => $request->comments,
            "loan_limit" => $request->loan_limit,
            "status" => $request->status,
            "user_id" => Auth::user()->id,
        ]);

        return redirect('customers')->with('success', 'Customer created successfully!');
    }

    public function show($id){
        $customer = Customer::findOrFail($id);
        return view('customers.view', compact('customer'));
    }

    public function edit($id){
        $customer = Customer::findOrFail($id);
        $products = Product::all();
        $banks = Bank::all();
        $towns = Town::with('county')->get();
        $states = CustomerStatus::all();
        $branches = Branch::where('bank_id', $customer->bank_id)->get();
        return view('customers.edit', compact('customer', 'products', 'towns', 'banks', 'states', 'branches'));
    }

    public function update(Request $request, $id){
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "other_name" => "required",
            "idNo" => "required",
            "primaryPhone" => "required",
            "work_email" => "required",
            "gender" => "required|integer",
            "dob" => "required|date",
            "product_id" => "required|integer",
            "bank_id" => "required|integer",
            "branch_id" => "required|integer",
            "job_type" => "required|integer",
            "business_address" => "required|string",
            "town_id" => "required|integer",
            "section" => "required|integer",
            "home_address" => "required",
            "loan_limit" => "required",
            "status" => "required|integer",
        ]);
        $customer = Customer::findOrFail($id);
        if(!empty($customer)){
            $customer->update([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "other_name" => $request->other_name,
                "idNo" => $request->idNo,
                "primaryPhone" => $request->primaryPhone,
                "secondaryPhone" => $request->secondaryPhone,
                "work_email" => $request->work_email,
                "gender" => $request->gender,
                "dob" => $request->dob,
                "product_id" => $request->product_id,
                "bank_id" => $request->bank_id,
                "branch_id" => $request->branch_id,
                "job_type" => $request->job_type,
                "business_address" => $request->business_address,
                "town_id" => $request->town_id,
                "section" => $request->section,
                "home_address" => $request->home_address,
                "comments" => $request->comments,
                "loan_limit" => $request->loan_limit,
                "status" => $request->status,
            ]);
            return redirect('customers')->with('success', 'Customer updated successfully!');
        }else return redirect('customers')->with('error', 'Customer not found!');
    }
}
