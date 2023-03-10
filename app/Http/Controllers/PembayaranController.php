<?php

namespace App\Http\Controllers;

use App\Models\Koperasi\Pembayaran;
use App\Models\Koperasi\AnggotaKoperasi;
use App\Models\Koperasi\PinjamanUsp;
use App\Models\Koperasi\PinjamanKonsumsi;
use App\Models\Koperasi\PinjamanEmergensi;
use Illuminate\Http\Request;
use App\Http\Requests\PembayaranRequestTable;
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
        $result = Pembayaran::orderBy("created_at","DESC")->get();
        return view('dashboard.cms_admin.koperasi.pembayaran.index',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $anggotas = PinjamanUsp::has('anggota')->get();
        return view('dashboard.cms_admin.koperasi.pembayaran.create',compact('anggotas'));
    }


    public function store(PembayaranRequestTable $request)
    {
        dd($request->all());

        $bulan = date('m', strtotime($request->tanggal));

        $model = "App\Models\Koperasi\\".$request->tipe;
        $usp = $model::find($request->anggota);
        $pembayaran = Pembayaran::whereMonth('tanggal',$bulan)->where('pembayaranable_id',$usp->id)->first();

        if($pembayaran == true) {
            Alert::error("Gagal", "Pembayaran dengan Nama " . $usp->anggota->nama . " Gagal ditambahkan karena sudah ada silahkan ubah nominal pembayaran di table pembayaran.");
            return redirect()->route('pembayaran.index');
        }

        $usp->pembayarans()->createMany([
                [
                    "tanggal"  => $request->tanggal,
                    "jumlah" => $request->bayar
                ],
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
        $result = $pembayaran;
        //    dd($pembayaran);

        return view('dashboard.cms_admin.koperasi.pembayaran.edit',compact('result'));
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
        // dd($request->all());pp
        $pembayaran->update([
            'tanggal' => $request->tanggal,
            'jumlah' => $request->bayar
        ]);
        Alert::success("Berhasil", "Data USP dengan Nama " . $pembayaran->pembayaranable->anggota->nama . " Telah diubah.");
        return redirect()->route('pembayaran.index');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        Alert::success("Berhasil", "Data USP dengan Nama " . $pembayaran->pembayaranable->anggota->nama . " Telah dihapus.");
        return redirect()->route('pembayaran.index');
    }

    public function emergensi() {
        $result = Pembayaran::where("pembayaranable_type","App\Models\Koperasi\PinjamanEmergensi")->orderBy("created_at","DESC")->get();
        return view('dashboard.cms_admin.koperasi.pembayaran.bayar-emergensi',compact('result'));
    }

    public function konsumsi() {
        $result = Pembayaran::where("pembayaranable_type","App\Models\Koperasi\PinjamanKonsumsi")->orderBy("created_at","DESC")->get();
        return view('dashboard.cms_admin.koperasi.pembayaran.bayar-emergensi',compact('result'));
    }

    public function tipePinjaman(Request $request) {
        $model = "App\Models\Koperasi\\".$request->tipe;
        return $model::with('anggota','pembayarans')->get();
    }

    public function cariAnggota(Request $request) {
        $model = "App\Models\Koperasi\\".$request->tipe;
            return $model::with('pembayarans')->where("id",$request->id)->first();
    }

    public function cariJenis(Request $request) {
        return AnggotaKoperasi::where("departemen",$request->n)->get();
    }

    public function idPeminjam(Request $request) {
        return PinjamanUsp::find($request->tipe);
    }
}
