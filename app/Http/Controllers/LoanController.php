<?php

namespace App\Http\Controllers;

use App\Helpers\Badge;
use App\Models\Customer;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller {
    public function index() {
        $loans = Loan::all();
        return view('loans.list', compact('loans'));
    }
    public function create($id) {
        $customer = Customer::findOrFail($id);
        return view('loans.create', compact('customer'));
    }
    public function store(Request $request, $id) {
        $request->validate([
            "loan_amount" => "required|numeric",
            "loan_period" => "required|integer",
            "pay_method" => "required|integer",
            "due_date" => "required|date",
        ]);
        $customer = Customer::findOrFail($id);
        if(!empty($customer)){
            $details = $this->calculate($request->loan_amount);
            $comments = "Loan created by ".Badge::set('primary', Auth::user()->name)." on ".Badge::set('secondary', date('Y-m-d H:i:s'));
            $loan = Loan::create([
                'customer_id' => $customer->id,
                'customer_phone' => $customer->primaryPhone,
                'given_date' => date('Y-m-d'),
                'due_date' => $request->due_date,
                'loan_amount' => $request->loan_amount,
                'loan_interest' => $details['loan_interest'],
                'processing_fee' => $details['processing_fee'],
                'loan_total' => $details['loan_total'],
                'product_id' => $customer->product_id,
                'bank_id' => $customer->bank_id,
                'loan_period' => $request->loan_period,
                'user_id' => Auth::user()->id,
                'comments' => $comments,
                'status_id' => 1,
                'section' => $customer->section,
                'new_loan' => 1,
            ]);
            return redirect('loans')->with('success', 'Loan created successfully!');
        }
        else return redirect()->back()->with('error', 'Customer not found.');
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

    /**
     * Calculates the loan interest and total amount given a loan amount.
     *
     * @param int $loan_amount
     * @return array
     */
    protected function calculate($loan_amount): array {
        $loan_interest = round($loan_amount * 0.25);
        $loan_total = $loan_amount + $loan_interest;
        $processing_fee = 0;
        return [
            'loan_interest' => $loan_interest,
            'loan_total' => $loan_total,
            'processing_fee' => $processing_fee,
        ];
    }
}
