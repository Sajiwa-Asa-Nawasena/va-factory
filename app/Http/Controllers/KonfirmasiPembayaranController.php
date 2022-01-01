<?php

namespace App\Http\Controllers;

use App\Models\PaymentConfirmation;
use Illuminate\Http\Request;

class KonfirmasiPembayaranController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('konfirmasi_pembayaran/index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek = PaymentConfirmation::create($request->all());
        if($cek){
            return redirect('https://vafactorystore.com/');
        }else{
            return redirect()->route('konfirmasi-pembayaran.index')
            ->with('error', 'Terjadi Kesalahan Saat Mengirim Data. Silahkan Coba Lagi !!!');
        }
    }
}
