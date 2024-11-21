<?php

namespace App\Http\Controllers;

use App\Helpers\Badge;
use App\Models\Loan;
use App\Models\Refinance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefinanceController extends Controller{
    public function index() {
        $refinances = Refinance::with(['loan', 'customer', 'user'])->get();
        return view('refinances.list', compact('refinances'));
    }

    public function create($id) {
        $loan = Loan::findOrFail($id);
        return view('refinances.create', compact('loan'));
    }

    public function store(Request $request, $id) {
        $request->validate([
            "principal_balance" => "required|numeric",
            "refinance_amount" => "required|numeric",
            "due_date" => "required|date",
        ]);
        $loan = Loan::findOrFail($id);
        $loan->update([
            'status_id' => 6,
            'top_up' => 1,
            'comments' => $loan->comments."<br> Loan cleared due to refinance by ".Badge::set('primary', Auth::user()->name)." on ".Badge::set('secondary', date('Y-m-d H:i:s')),
        ]);
        $loan_amount = $request->principal_balance + $request->refinance_amount;
        $details = Loan::calculate($loan_amount);
        $comments = "Refinance created by ".Badge::set('primary', Auth::user()->name)." on ".Badge::set('secondary', date('Y-m-d H:i:s'));
        $newLoan = Loan::create([
            'customer_id' => $loan->customer_id,
            'customer_phone' => $loan->customer->primaryPhone,
            'given_date' => date('Y-m-d'),
            'due_date' => $request->due_date,
            'loan_amount' => $loan_amount,
            'loan_interest' => $details['loan_interest'],
            'processing_fee' => $details['processing_fee'],
            'loan_total' => $details['loan_total'],
            'product_id' => $loan->customer->product_id,
            'bank_id' => $loan->customer->bank_id,
            'loan_period' => 1,
            'user_id' => Auth::user()->id,
            'comments' => $comments,
            'status_id' => 1,
            'section' => $loan->customer->section,
            'new_loan' => 1,
        ]);
        Refinance::create([
            'loan_id' => $newLoan->id,
            'customer_id' => $newLoan->customer_id,
            'amount' => $request->refinance_amount,
            'due_date' => $request->due_date,
            'customer_phone' => $newLoan->customer->primaryPhone,
            'user_id' => Auth::user()->id,
            'receipt' => 'Funds Disbursed',
            'status' => 2,
        ]);
        return redirect('loans')->with('success', 'Refinance created successfully!');
    }
}
