<?php

namespace App\Http\Controllers;

use App\Models\CashFlow;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dateStart = date('Y-m-01');
        $dateEnd = date('Y-m-d');

        $totalMoneyInDebit = CashFlow::whereBetween('date', [$dateStart, $dateEnd])->where('payment_types_id', 2)->sum('amount');
        $totalMoneyInCash = CashFlow::whereBetween('date', [$dateStart, $dateEnd])->where('payment_types_id', 1)->sum('amount');
        $totalCashIn = CashFlow::whereBetween('date', [$dateStart, $dateEnd])->where('cash_flow_types_id', 1)->sum('amount');
        $totalCashOut = CashFlow::whereBetween('date', [$dateStart, $dateEnd])->where('cash_flow_types_id', 2)->sum('amount');

        return view('dashboard.index', compact('totalMoneyInDebit', 'totalMoneyInCash', 'totalCashIn', 'totalCashOut'));
    }

    public function settings()
    {
        return view('dashboard.settings');
    }
}
