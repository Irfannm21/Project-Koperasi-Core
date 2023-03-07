<?php

namespace App\Http\Controllers;

use App\Models\Koperasi\PinjamanUsp;
use App\Models\Koperasi\PinjamanEmergensi;
use App\Models\Koperasi\PinjamanKonsumsi;
use App\Models\Koperasi\AnggotaKoperasi;
use App\Http\Requests\PinjamanRequestTable;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class PinjamanUspController extends Controller
{

    public function index()
    {
        $results = PinjamanUsp::all();
        return view('dashboard.cms_admin.koperasi.usp.index',compact('results'));
    }


    public function create()
    {
        $anggotas = AnggotaKoperasi::with('usps')->get();
        return view('dashboard.cms_admin.koperasi.usp.create',compact('anggotas'));
    }


    public function store(PinjamanRequestTable $request)
    {
        $anggota = AnggotaKoperasi::find($request->kode);

        foreach($anggota->usps as $val) {
            if($val->pembayarans->sum('jumlah') >= $val->jumlah) {
                continue;
            } else{
                Alert::error("Gagal", $anggota->nama . " masih mempunyai cicilan, silahkan lunasi terlebih dahulu.");
                return redirect()->route('usp.index');
            }
        }


        $cicilan = intval(preg_replace('/[^0-9]/', '',(str_replace(['Rp', ".", ' '], '', $request->cicilan))));
        $val = new PinjamanUsp;
        $val->tanggal = $request->tanggal;
        $val->jumlah = $request->jumlah;
        $val->tenor = $request->tenor;
        $val->cicilan = $cicilan;

        $anggota->usps()->save($val);
        Alert::success("Berhasil", "Pinjaman USP dengan Nama " . $anggota->nama . " Telah ditambahkan.");
        return redirect()->route('usp.index');
    }


    public function show(PinjamanUsp $pinjamanUsp)
    {
        //
    }

    public function edit($id)
    {
        $anggotas = AnggotaKoperasi::all(['id','kode','nama']);
        $result = PinjamanUsp::find($id);
        return view('dashboard.cms_admin.koperasi.usp.edit',compact('result','anggotas'));
    }


    public function update(PinjamanRequestTable $request, PinjamanUsp $pinjamanUsp)
    {
        $anggota = AnggotaKoperasi::find($request->kode);

        $cicilan = intval(preg_replace('/[^0-9]/', '',(str_replace(['Rp', ".", ' '], '', $request->cicilan))));
        $anggota->usps()->update([
            "tanggal" => $request->tanggal,
            "jumlah" => $request->jumlah,
            "tenor" => $request->tenor,
            "cicilan" => $cicilan
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
