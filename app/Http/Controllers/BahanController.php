<?php

namespace App\Http\Controllers;

use App\Models\DataBahan;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databahan = DataBahan::latest()->paginate(5);
        return view('datamaster/bahan/index', compact('databahan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datamaster/bahan/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek = DataBahan::create($request->all());

        if($cek){
            return redirect()->route('data-bahan.index')
            ->with('success', 'Data Bahan Berhasil Disimpan.');
        }else{
            return redirect()->route('data-bahan.index')
            ->with('denger', 'Data Bahan Gagal Disimpan.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(DataBahan $DataBahan)
    {
        $DataBahan->delete();

        return redirect()->route('data-bahan.index')
            ->with('success', 'Data Bahan Berhasil Dihapus');
    }
}
