<?php

namespace App\Http\Controllers;

use App\Models\Koperasi\Pembayaran;
use App\Models\Koperasi\AnggotaKoperasi;
use App\Models\Koperasi\PinjamanUsp;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Pembayaran::all();
        return view('dashboard.cms_admin.koperasi.pembayaran.index',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anggotas = PinjamanUsp::has('anggota')->get();
        return view('dashboard.cms_admin.koperasi.pembayaran.create',compact('anggotas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usp = PinjamanUsp::find($request->kode);
        $usp->pembayarans()->createMany([
            [
                "tanggal"  => $request->tanggal,
                "jumlah" => $request->jumlah
            ]
            ]);
        Alert::success("Berhasil", "Pembayaran USP dengan Nama " . $usp->anggota->nama . " Telah ditambahkan.");
        return redirect()->route('pembayaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
