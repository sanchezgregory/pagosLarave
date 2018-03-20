<?php

namespace App\Http\Controllers;

use App\Payment;
use App\User;
use Illuminate\Http\Request;
use Validator;

class PaymentController extends Controller
{
    public function index()
    {
        $title = "Listado de pagos";
        $payments = Payment::all();

        return view('payments.index', compact('payments', 'title'));
    }

    public function create()
    {
        $users = User::all();
        $title = "Realizar un pago";

        return view('payments.create', compact('title', 'users'));
    }

    public function store(Request $request)
    {

        $pago = new Payment();

        $v = Validator::make($request->all(), [
            'importe' => 'required|numeric|min:1|max:9999999'
        ]);

        if ($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $pago = $pago->create($request->all());

        $pago->users()->attach($request->username);

        return redirect()->route('payment.index');
    }

    public function show($id)
    {
        $title = "Detalles del pago";
        $payment = Payment::findOrFail($id);

        return view('payments.show', compact('title', 'payment'));
    }

    public function edit($id)
    {
        $title = "Editando pago";
        $payment = Payment::findOrfail($id);

        return view('payments.edit', compact('title','payment'));
    }
}
