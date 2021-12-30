<?php

namespace App\Http\Controllers;

use App\Models\CashFlowType;
use Illuminate\Http\Request;

class CashFlowTypeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:cash.flow.types.list|cash.flow.types.create|cash.flow.types.update|cash.flow.types.delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:cash.flow.types.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:cash.flow.types.update', ['only' => ['update']]);
        $this->middleware('permission:cash.flow.types.delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashFlowTypes = CashFlowType::latest()->paginate(5);
        return view('cash_flow_types.index', compact('cashFlowTypes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cash_flow_types.create');
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
            'name' => 'required|unique:cash_flow_types,name'
        ]);

        CashFlowType::create($request->all());

        return redirect()->route('cash-flow-types.index')
            ->with('success', 'Cash flow type created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CashFlowType  $cashFlowType
     * @return \Illuminate\Http\Response
     */
    public function show(CashFlowType $cashFlowType)
    {
        return view('cash_flow_types.show', compact('cashFlowType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CashFlowType  $cashFlowType
     * @return \Illuminate\Http\Response
     */
    public function edit(CashFlowType $cashFlowType)
    {
        return view('cash_flow_types.edit', compact('cashFlowType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CashFlowType  $cashFlowType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CashFlowType $cashFlowType)
    {
        request()->validate([
            'name' => 'required|unique:cash_flow_types,name,' . $cashFlowType->id
        ]);

        $cashFlowType->update($request->all());

        return redirect()->route('cash-flow-types.index')
            ->with('success', 'Cash flow type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CashFlowType  $cashFlowType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashFlowType $cashFlowType)
    {
        $cashFlowType->delete();

        return redirect()->route('cash-flow-types.index')
            ->with('success', 'Cash flow type deleted successfully');
    }
}
