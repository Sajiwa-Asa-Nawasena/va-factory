<?php

namespace App\Http\Controllers;

use App\Models\DataBahan;
use App\Models\DataJenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datajenis = DataJenis::latest()->paginate(5);
        return view('datamaster/jenis/index', compact('datajenis'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $databahan = DataBahan::all();
        return view('datamaster/jenis/create',compact('databahan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek = DataJenis::create($request->all());

        if($cek){
            return redirect()->route('data-jenis.index')
            ->with('success', 'Data Jenis Berhasil Disimpan.');
        }else{
            return redirect()->route('data-jenis.index')
            ->with('denger', 'Data Jenis Gagal Disimpan.');
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
    public function destroy(DataJenis $jenis)
    {
        $jenis->delete();
        return redirect()->route('data-jenis.index')
            ->with('success', 'Data Jenis Berhasil Dihapus');
    }
}
