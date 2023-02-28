<?php

namespace App\Http\Controllers;

use App\Models\Koperasi\AnggotaKoperasi;
use App\Models\Koperasi\PinjamanEmergensi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\PinjamanRequestTable;
class PinjamanEmergensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = PinjamanEmergensi::all();
        return view('dashboard.cms_admin.koperasi.emergensi.index',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anggotas = AnggotaKoperasi::with('usps')->get();
        return view('dashboard.cms_admin.koperasi.emergensi.create',compact('anggotas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PinjamanRequestTable $request)
    {
        $anggota = AnggotaKoperasi::find($request->kode);

        foreach($anggota->emergensis as $val) {
            if($val->pembayarans->sum('jumlah') >= $val->jumlah) {
                continue;
            } else{
                Alert::error("Gagal", $anggota->nama . " masih mempunyai cicilan, silahkan lunasi terlebih dahulu.");
                return redirect()->route('emergensi.index');
            }
        }

        $cicilan = intval(preg_replace('/[^0-9]/', '',(str_replace(['Rp', ".", ' '], '', $request->cicilan))));
        $val = new PinjamanEmergensi;
        $val->tanggal = $request->tanggal;
        $val->jumlah = $request->jumlah;
        $val->tenor = $request->tenor;
        $val->cicilan = $cicilan;

        $anggota->usps()->save($val);
        Alert::success("Berhasil", "Pinjaman Emergensi dengan Nama " . $anggota->nama . " Telah ditambahkan.");
        return redirect()->route('emergensi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PinjamanEmergensi  $pinjamanEmergensi
     * @return \Illuminate\Http\Response
     */
    public function show(PinjamanEmergensi $pinjamanEmergensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PinjamanEmergensi  $pinjamanEmergensi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggotas = AnggotaKoperasi::all(['id','kode','nama']);
        $result = PinjamanEmergensi::find($id);
        return view('dashboard.cms_admin.koperasi.emergensi.edit',compact('result','anggotas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PinjamanEmergensi  $pinjamanEmergensi
     * @return \Illuminate\Http\Response
     */
    public function update(PinjamanRequestTable $request, PinjamanEmergensi $pinjamanEmergensi)
    {
        $anggota = AnggotaKoperasi::find($request->kode);

        $cicilan = intval(preg_replace('/[^0-9]/', '',(str_replace(['Rp', ".", ' '], '', $request->cicilan))));
        $anggota->emergensis()->update([
            "tanggal" => $request->tanggal,
            "jumlah" => $request->jumlah,
            "tenor" => $request->tenor,
            "cicilan" => $cicilan
        ]);
        Alert::success("Berhasil", "Pinjaman Emergensi dengan Nama " . $anggota->nama . " Telah ditambahkan.");
        return redirect()->route('emergensi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PinjamanEmergensi  $pinjamanEmergensi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        PinjamanEmergensi::find($id)->delete();
        Alert::success("Berhasil", "Data Emergensi dengan nama $ Berhasil dihapus");
        return redirect()->route('emergensi.index');
    }
}
