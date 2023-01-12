<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koperasi\AnggotaKoperasi;

class AnggotaKoperasiController extends Controller
{

    public function index()
    {
        $anggota = AnggotaKoperasi::all(['kode','nama','departemen','bagian']);
        return view('dashboard.koperasi.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.koperasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anggota = new AnggotaKoperasi;
        $anggota->kode = $request->kode;
        $anggota->nama = $request->nama;
        $anggota->departemen = $request->departemen;
        $anggota->bagian = $request->bagian;
        $anggota->save();

        return redirect()->route('/anggota-koperasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnggotaKoperasi  $anggotaKoperasi
     * @return \Illuminate\Http\Response
     */
    public function show(AnggotaKoperasi $anggotaKoperasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnggotaKoperasi  $anggotaKoperasi
     * @return \Illuminate\Http\Response
     */
    public function edit(AnggotaKoperasi $anggotaKoperasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnggotaKoperasi  $anggotaKoperasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnggotaKoperasi $anggotaKoperasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnggotaKoperasi  $anggotaKoperasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnggotaKoperasi $anggotaKoperasi)
    {
        //
    }
}
