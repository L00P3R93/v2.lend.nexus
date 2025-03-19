<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller{
    public function index(){
        $leads = Customer::where('status', 6)->get();
        return view('leads.list', compact('leads'));
    }

    public function showBank(){
        $leads = Customer::where('status', 6)->where('product_id', 1)->get();
        return view('leads.bankers.list', compact('leads'));
    }

    public function showCivil(){
        $leads = Customer::where('status', 6)->where('product_id', 2)->get();
        return view('leads.civil.list', compact('leads'));
    }
    public function create(){
        $products = Product::all();
        $banks = Bank::all();
        $towns = Town::with('county')->get();
        return view('leads.create', compact('products', 'banks', 'towns'));
    }
    public function store(Request $request){
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "primaryPhone" => "required|unique:customers,primaryPhone",
            "product_id" => "required|integer",
            "bank_id" => "required|integer",
            "branch_id" => "required|integer",
            "town_id" => "required|integer",
            "section" => "required|integer",
        ]);
        $lead = Customer::create([
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
            "business_address" => $request->business_address,
            "town_id" => $request->town_id,
            "section" => $request->section,
            "home_address" => $request->home_address,
            "comments" => $request->comment,
            "status" => 6,
            "user_id" => Auth::user()->id,
        ]);
        return redirect('leads')->with('success', 'Lead created successfully!');
    }
    public function show($id){
        $lead = Customer::findOrFail($id);
        return view('leads.view', compact('lead'));
    }
    public function edit($id){
        $lead = Customer::findOrFail($id);
        $products = Product::all();
        $banks = Bank::all();
        $towns = Town::with('county')->get();
        $branches = Branch::where('bank_id', $lead->bank_id)->get();
        return view('leads.edit', compact('lead', 'products', 'banks', 'towns', 'branches'));
    }
    public function update(Request $request, $id){
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "primaryPhone" => "required",
            "product_id" => "required|integer",
            "bank_id" => "required|integer",
            "branch_id" => "required|integer",
            "town_id" => "required|integer",
            "section" => "required|integer",
        ]);
        $lead = Customer::findOrFail($id);
        $lead->update([
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
            "business_address" => $request->business_address,
            "town_id" => $request->town_id,
            "section" => $request->section,
            "home_address" => $request->home_address,
            "comments" => $request->comment,
        ]);
        return redirect('leads')->with('success', 'Lead updated successfully!');
    }
}
