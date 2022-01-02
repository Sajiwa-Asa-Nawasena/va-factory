<?php

namespace App\Http\Controllers;

use App\Models\CashFlow;
use App\Models\CashFlowType;
use App\Models\PaymentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CashFlowController extends Controller
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
        // $cashFlows = CashFlow::latest()->paginate(5);
        $cashFlows = DB::table('cash_flows')
        ->join('cash_flow_types', 'cash_flows.cash_flow_types_id', '=', 'cash_flow_types.id')
        ->join('payment_types', 'cash_flows.cash_flow_types_id', '=', 'payment_types.id')
        ->join('users', 'cash_flows.users_id', '=', 'users.id')
        ->select('cash_flows.id', 'cash_flows.date', 'cash_flow_types.name as cash_flow_type', 'payment_types.name as payment_type', 'cash_flows.amount', 'cash_flows.description', 'users.name as user')
        ->orderBy('cash_flows.date', 'DESC')->paginate(10);

        return view('cash_flows.index', compact('cashFlows'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cashFlowTypes= CashFlowType::all();
        $paymentTypes = PaymentType::all();

        return view('cash_flows.create', compact('cashFlowTypes', 'paymentTypes'));
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
            'cash_flow_types_id' => 'required|numeric',
            'payment_types_id' => 'numeric',
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'description' => 'required|string'
        ]);

        CashFlow::create($request->all());

        return redirect()->route('cash-flows.index')
            ->with('success', 'Cash flow created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CashFlow  $cashFlow
     * @return \Illuminate\Http\Response
     */
    public function show(CashFlow $cashFlow)
    {
        return view('cash_flows.show', compact('cashFlow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CashFlow  $cashFlow
     * @return \Illuminate\Http\Response
     */
    public function edit(CashFlow $cashFlow)
    {
        $cashFlowTypes= CashFlowType::all();
        $paymentTypes = PaymentType::all();

        return view('cash_flows.edit', compact('cashFlow', 'cashFlowTypes', 'paymentTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CashFlow  $cashFlow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CashFlow $cashFlow)
    {
        request()->validate([
            'cash_flow_types_id' => 'required|numeric',
            'payment_types_id' => 'numeric',
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'description' => 'required|string'
        ]);

        $cashFlow->update($request->all());

        return redirect()->route('cash-flows.index')
            ->with('success', 'Cash flow updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CashFlow  $cashFlow
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashFlow $cashFlow)
    {
        $cashFlow->delete();

        return redirect()->route('cash-flows.index')
            ->with('success', 'Cash flow deleted successfully');
    }
}
