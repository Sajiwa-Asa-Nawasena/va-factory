<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:payment.types.list|payment.types.create|payment.types.edit|payment.types.delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:payment.types.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:payment.types.update', ['only' => ['update']]);
        $this->middleware('permission:payment.types.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentTypes = PaymentType::latest()->paginate(5);
        return view('payment_types.index', compact('paymentTypes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|unique:payment_types,name'
        ]);

        PaymentType::create($request->all());

        return redirect()->route('payment-types.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentType $paymentType)
    {
        return view('payment_types.show', compact('paymentType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentType $paymentType)
    {
        return view('payment_types.edit', compact('paymentType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentType $paymentType)
    {
        request()->validate([
            'name' => 'required|unique:payment_types,name,' . $paymentType->id
        ]);

        $paymentType->update($request->all());

        return redirect()->route('payment-types.index')
            ->with('success', 'Payment type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentType $paymentType)
    {
        $paymentType->delete();

        return redirect()->route('payment-types.index')
            ->with('success', 'Payment type deleted successfully');
    }
}
