<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAnggotaRequest;

use App\Models\Koperasi\AnggotaKoperasi;
use App\Models\Koperasi\Pembayaran;
use App\Models\Koperasi\PinjamanUsp;
use App\Models\Koperasi\PinjamanEmergensi;
use App\Models\Koperasi\PinjamanKonsumsi;
use Spatie\Permission\Models\Permission;

use RealRashid\SweetAlert\Facades\Alert;

use DataTables;
use Yajra\DataTables\Html\Builder;


class AnggotaKoperasiController extends Controller
{

    public function index(Builder $builder)
    {
        if (request()->ajax()) {
            return DataTables::of(AnggotaKoperasi::all())->toJson();
        }

        $html = $builder->columns([
            ['data' => 'kode','name' => 'kode','title' => 'Kode Anggota'],
            ['data' => 'nama','name' => 'nama','title' => 'Nama'],
            ['data' => 'departemen','name' => 'departemen','title' => 'Departemen'],
            ['data' => 'bagian','name' => 'bagian','title' => 'Bagian'],
        ]);
        Builder::macro('addEditColumn', function () {
            $attributes = [
                'title'          => 'Edit',
                'data'           => 'edit',
                'name'           => '',
                'orderable'      => false,
                'searchable'     => false,
            ];

            $this->collection->push(new Column($attributes));


            return $this;
        });

        return view('dashboard.cms_admin.koperasi.anggota.index', compact('html'));
    }

    public function create()
    {
        return view('dashboard.cms_admin.koperasi.anggota.create');
    }


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


    public function show(AnggotaKoperasi $anggotaKoperasi)
    {
        $results = AnggotaKoperasi::all();
         return view('dashboard.cms_admin.koperasi.anggota.detail', compact('results'));
    }


    public function edit($id)
    {
        $result = AnggotaKoperasi::findOrFail($id);
        return view('dashboard.cms_admin.koperasi.anggota.edit',compact('result'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        AnggotaKoperasi::find($id)->update($request->all());
        Alert::success("Berhasil", "Data Anggota $request->nama Berhasil dirubah");
        return redirect()->route('anggota-koperasi.index');
    }

   public function destroy($id, Request $request)
    {
        AnggotaKoperasi::findOrFail($id)->delete();
        Alert::success("Berhasil", "Data Anggota $request->nama Berhasil dihapus");
        return redirect()->route('anggota-koperasi.index');
    }

    public function cariAnggota(request $request) {
        $data['anggota'] = AnggotaKoperasi::with('simpanan_wajibs')->findOrFail($request->id);
        $data['usp'] = PinjamanUsp::with('pembayarans')->where("anggota_id",$request->id)->get();
        $data['emergensi'] = PinjamanEmergensi::with('pembayarans')->where("anggota_id",$request->id)->get();
        $data['konsumsi'] = PinjamanKonsumsi::with('pembayarans')->where("anggota_id",$request->id)->get();

        return $data;
    }

    public function table() {
        return DataTables::of(AnggotaKoperasi::all())->toJson();
    }

}
