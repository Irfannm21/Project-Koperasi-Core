<?php

namespace App\Http\Controllers;
use App\Models\Koperasi\PinjamanKonsumsi;
use App\Models\Koperasi\AnggotaKoperasi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\KonsumsiRequestTable;
class PinjamanKonsumsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = PinjamanKonsumsi::all();
        return view('dashboard.cms_admin.koperasi.konsumsi.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $results = AnggotaKoperasi::get(['id','kode','nama']);
        return view('dashboard.cms_admin.koperasi.konsumsi.create',compact('results'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KonsumsiRequestTable $request)
    {
        // dd($request->all());
        $anggota = AnggotaKoperasi::find($request->kode);

        $result = new PinjamanKonsumsi;
        $result->tanggal = $request->tanggal;
        $result->jumlah = $this->RupiahToInteger($request->jumlah);

        $anggota->konsumsis()->save($result);
        Alert::success("Berhasil", "Pinjaman Konsumsi dengan Nama " . $anggota->nama . " Telah ditambahkan.");
        return redirect()->route('konsumsi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PinjamanKonsumsi  $pinjamanKonsumsi
     * @return \Illuminate\Http\Response
     */
    public function show(PinjamanKonsumsi $pinjamanKonsumsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PinjamanKonsumsi  $pinjamanKonsumsi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = PinjamanKonsumsi::find($id);
        return view('dashboard.cms_admin.koperasi.konsumsi.edit',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PinjamanKonsumsi  $pinjamanKonsumsi
     * @return \Illuminate\Http\Response
     */
    public function update(KonsumsiRequestTable $request)
        {
        $result = PinjamanKonsumsi::find($request->kode);
        $result->update([
            'tanggal' => $request->tanggal,
            'jumlah' => $this->RupiahToInteger($request->jumlah),
        ]);
        Alert::success("Berhasil", "Data Konsumsi dengan Nama " . $result->anggota->nama . " Telah diubah.");
        return redirect()->route('konsumsi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PinjamanKonsumsi  $pinjamanKonsumsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(PinjamanKonsumsi $pinjamanKonsumsi)
    {
        //
    }
}
