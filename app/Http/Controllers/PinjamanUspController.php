<?php

namespace App\Http\Controllers;

use App\Models\Koperasi\PinjamanUsp;
use App\Models\Koperasi\AnggotaKoperasi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class PinjamanUspController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = PinjamanUsp::all();
        return view('dashboard.cms_admin.koperasi.usp.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anggotas = AnggotaKoperasi::all(['id','kode','nama']);
        return view('dashboard.cms_admin.koperasi.usp.create',compact('anggotas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anggota = AnggotaKoperasi::find($request->kode);

        $val = new PinjamanUsp;
        $val->tanggal = $request->tanggal;
        $val->jumlah = $request->jumlah;
        $val->tenor = $request->tenor;
        $val->cicilan = $request->cicilan;

        $anggota->usps()->save($val);
        Alert::success("Berhasil", "Pinjaman USP dengan Nama " . $anggota->nama . " Telah ditambahkan.");
        return redirect()->route('usp.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PinjamanUsp  $pinjamanUsp
     * @return \Illuminate\Http\Response
     */
    public function show(PinjamanUsp $pinjamanUsp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PinjamanUsp  $pinjamanUsp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggotas = AnggotaKoperasi::all(['id','kode','nama']);
        $result = PinjamanUsp::find($id);
        return view('dashboard.cms_admin.koperasi.usp.edit',compact('result','anggotas'));
    }


    public function update(Request $request, PinjamanUsp $pinjamanUsp)
    {
        $anggota = AnggotaKoperasi::find($request->kode);

        $anggota->usps()->update([
            "tanggal" => $request->tanggal,
            "jumlah" => $request->jumlah,
            "tenor" => $request->tenor,
            "cicilan" => $request->cicilan
        ]);
        Alert::success("Berhasil", "Pinjaman USP dengan Nama " . $anggota->nama . " Telah ditambahkan.");
        return redirect()->route('usp.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PinjamanUsp  $pinjamanUsp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        PinjamanUsp::find($id)->delete();
        Alert::success("Berhasil", "Data USP dengan nama $request->nama Berhasil dihapus");
        return redirect()->route('usp.index');
    }
}
