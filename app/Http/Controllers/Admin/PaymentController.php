<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payment = Payment::all();

        return view('admin.payment.index', ['payment' => $payment]);
    }

    public function add()
    {
        return view('admin.payment.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'type' => 'required',
            'name' => 'required',
            'number' => 'required|numeric'
        ]);

        $payment = new Payment();

        $payment->company = $request->company;
        $payment->type = $request->type;
        $payment->name = $request->name;
        $payment->number = $request->number;

        $payment->save();

        return redirect()->route('admin.payment.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'type' => 'required',
            'name' => 'required',
            'number' => 'required|numeric'
        ]);

        $payment = Payment::findOrFail($request->id);

        $payment->company = $request->company;
        $payment->type = $request->type;
        $payment->name = $request->name;
        $payment->number = $request->number;

        $payment->save();

        return redirect()->route('admin.payment.index');
    }

    public function edit(Request $request)
    {
        $payment = Payment::findOrFail($request->id);

        return view('admin.payment.edit', ['payment' => $payment]);
    }

    public function delete(Request $request)
    {
        Payment::destroy($request->id);

        return redirect()->route('admin.payment.index');
    }
}
