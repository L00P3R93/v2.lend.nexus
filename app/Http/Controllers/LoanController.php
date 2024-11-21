<?php

namespace App\Http\Controllers;

use App\Helpers\Badge;
use App\Models\Bank;
use App\Models\Customer;
use App\Models\Loan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
            $details = Loan::calculate($request->loan_amount);
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
        $banks = Bank::all();
        return view('loans.edit', compact('loan', 'banks'));
    }
    public function update(Request $request, $id) {
        $request->validate([
            "loan_amount" => "required|numeric",
            "loan_interest" => "required|numeric",
            "given_date" => "required|date",
            "due_date" => "required|date",
            "bank_id" => "required|integer",
            "late_penalty" => "required|numeric",
            "bounce_cheque" => "required|numeric",
            "recovery_fee" => "required|numeric",
            "penalty_total" => "required|numeric",
            "loan_total" => "required|numeric",
        ]);
        $loan = Loan::findOrFail($id);

        $loan->update([
            "loan_amount" => $request->loan_amount,
            "loan_interest" => $request->loan_interest,
            "given_date" => $request->given_date,
            "due_date" => $request->due_date,
            "bank_id" => $request->bank_id,
            "late_penalty" => $request->late_penalty,
            "bounce_cheque" => $request->bounce_cheque,
            "recovery_fee" => $request->recovery_fee,
            "penalty_total" => $request->penalty_total,
            "loan_total" => $request->loan_total,
        ]);
        return redirect('loans')->with('success', 'Loan updated successfully!');
    }

    public function loanAction($id, $action){
        $loan = Loan::findOrFail($id);

        // Define action mappings
        $actions = [
            'verify' => ['status' => 2, 'message' => 'Verified'],
            'confirm' => ['status' => 3, 'message' => 'Confirmed'],
            'approve' => ['status' => 4, 'message' => 'Approved'],
            'disburse' => ['status' => 5, 'message' => 'Disbursed'],
            'clear' => ['status' => 6, 'message' => 'Cleared'],
            'reject' => ['status' => 12, 'message' => 'Rejected'],
        ];

        // Check if the action exists in the mappings
        if (isset($actions[$action])) {
            $details = $actions[$action];
            $comments = sprintf(
                "Loan %s by %s on %s",
                Badge::set('info', $details['message']),
                Badge::set('default', Auth::user()->name),
                Badge::set('default', now()->format('Y-m-d H:i:s'))
            );

            $loan->update([
                'status_id' => $details['status'],
                'comments' => $loan->comments . '<br>' . $comments,
            ]);

            return redirect(url('/loans/' . $loan->id))->with('success', "Loan {$details['message']} Successfully");
        }

        // Default case for undefined actions
        return redirect(url('/loans/' . $loan->id))->with('error', 'Loan Action Not Defined!');
    }

    public function collectionsList() {
        $loans = Loan::whereIn('status_id', [5,7])
            ->where(function (Builder $query){
                $query->where('due_date', '>=', Carbon::now()->startOfMonth())
                    ->where('due_date', '<=', Carbon::now()->endOfMonth());
            })->get();
        return view('loans.collections_list', compact('loans'));
    }
}
