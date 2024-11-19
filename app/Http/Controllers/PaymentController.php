<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller {
    public function index(){
        $payments = Payment::with(['loan', 'customer', 'product'])->get();
        return view('payments.list', compact('payments'));
    }
    public function create(){
        return view('payments.create');
    }
    /**
     * Creates a new payment based on the given loan ID.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function createFromLoan($id){
        $loan = Loan::findOrFail($id);
        return view('payments.create', compact('loan'));
    }
    public function store(Request $request){
        $request->validate([
            "phone" => "required|numeric",
            "payment_method" => "required|integer",
            "receipt" => "required|string|unique:payments,receipt",
            "amount" => "required|numeric",
            "loan_id" => "required|integer"
        ]);
        $loan = Loan::findOrFail($request->loan_id);
        if(!empty($loan)){
            $payment = Payment::create([
                'loan_id' => $request->loan_id,
                'customer_id' => $loan->customer_id,
                'product_id' => $loan->product_id,
                'phone' => $request->phone,
                'amount' => $request->amount,
                'payment_method' => $request->payment_method,
                'date_received' => date('Y-m-d H:i:s'),
                'receipt' => $request->receipt,
                'status' => 1
            ]);
            return redirect('payments')->with('success', 'Payment created successfully!');
        }else return redirect()->back()->with('error', 'Loan ID not found!');
    }
    public function storeFromLoan(Request $request, $id){
        dd($request->all());
    }
    public function show($id){
        $payment = Payment::findOrFail($id);
        return view('payments.view', compact('payment'));
    }
    public function edit($id){
        $payment = Payment::findOrFail($id);
        return view('payments.edit', compact('payment'));
    }
    public function update(Request $request, $id){
        $request->validate([
            "phone" => "required|numeric",
            "payment_method" => "required|integer",
            "receipt" => "required|string|unique:payments,receipt",
            "amount" => "required|numeric",
            "loan_id" => "required|integer"
        ]);
        $payment = Payment::findOrFail($id);
        if(!empty($payment)){
            $payment->update([
                'loan_id' => $request->loan_id,
                'phone' => $request->phone,
                'amount' => $request->amount,
                'payment_method' => $request->payment_method,
                'receipt' => $request->receipt,
            ]);
            return redirect('payments')->with('success', 'Payment updated successfully!');
        }else return redirect()->back()->with('error', 'Payment not found!');
    }

}
