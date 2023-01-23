<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAnggotaRequest;

use App\Models\Koperasi\AnggotaKoperasi;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;
class AnggotaKoperasiController extends Controller
{

    public function index()
    {
        $anggota = AnggotaKoperasi::get(['id','kode','nama','departemen','bagian']);
        return view('dashboard.cms_admin.koperasi.anggota.index',compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.cms_admin.koperasi.anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnggotaRequest $request)
    {
        // dd($request->all());
        $anggota = new AnggotaKoperasi;
        $anggota->kode = $request->kode;
        $anggota->nama = $request->nama;
        $anggota->departemen = $request->departemen;
        $anggota->bagian = $request->bagian;
        $anggota->save();

        Alert::success("Berhasil", "Anggota $request->nama Berhasil dibuat");
        return redirect()->route('anggota-koperasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnggotaKoperasi  $anggotaKoperasi
     * @return \Illuminate\Http\Response
     */
    public function show(AnggotaKoperasi $anggotaKoperasi)
    {
         return view('dashboard.cms_admin.koperasi.anggota.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnggotaKoperasi  $anggotaKoperasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = AnggotaKoperasi::findOrFail($id);
        return view('dashboard.cms_admin.koperasi.anggota.edit',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnggotaKoperasi  $anggotaKoperasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        AnggotaKoperasi::find($id)->update($request->all());
        Alert::success("Berhasil", "Data Anggota $request->nama Berhasil dirubah");
        return redirect()->route('anggota-koperasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnggotaKoperasi  $anggotaKoperasi
     * @return \Illuminate\Http\Response
     */
   public function destroy($id, Request $request)
    {
        AnggotaKoperasi::findOrFail($id)->delete();
        Alert::success("Berhasil", "Data Anggota $request->nama Berhasil dihapus");
        return redirect()->route('anggota-koperasi.index');


    }
}
