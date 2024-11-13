<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller {
    public function index() {
        $loans = Loan::all();
        return view('loans.list', compact('loans'));
    }
    public function create($id) {
        $customer = Customer::findOrFail($id);
        return view('loans.create', compact('customer'));
    }
    public function store(Request $request) {
        dd($request->all());
    }
    public function show($id) {
        $loan = Loan::findOrFail($id);
        return view('loans.view', compact('loan'));
    }
    public function edit($id) {
        $loan = Loan::findOrFail($id);
        return view('loans.edit', compact('loan'));
    }
    public function update(Request $request, $id) {
        dd($request->all());
    }
}
