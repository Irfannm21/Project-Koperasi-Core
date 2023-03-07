<?php

namespace App\Http\Controllers;

use App\Models\Koperasi\SimpananWajib;
use App\Models\Koperasi\AnggotaKoperasi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class SimpananWajibController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = SimpananWajib::all();
        return view('dashboard.cms_admin.koperasi.simpanan-wajib.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.cms_admin.koperasi.simpanan-wajib.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->tipe);
        switch ($request->tipe) {
            case 'Marketing':
                $results = AnggotaKoperasi::select('id')->where('departemen',"Marketing")->get();
                break;
                case 'Engineering':
                    break;
                    $results = AnggotaKoperasi::select('id')->where('departemen',"Engineering")->get();
                    case 'IT':
                        $results = AnggotaKoperasi::select('id')->where('bagian',"IT")->get();
                        break;
                        case 'Administrasi':
                            $results = AnggotaKoperasi::select('id')->where('bagian',"Administrasi")->get();
                            break;
            default:
            $results = AnggotaKoperasi::all();
                break;
        }

        foreach($results as $val) {
            $item = new SimpananWajib;
            $item->tanggal = $request->tanggal;
            $item->jumlah_simpanan = $request->jumlah;

            $val->simpanan_wajibs()->save($item);
        }
        Alert::success("Berhasil", "Simpanan Wajib Telah ditambahkan.");
        return redirect()->route('simpanan-wajib.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SimpananWajib  $simpananWajib
     * @return \Illuminate\Http\Response
     */
    public function show(SimpananWajib $simpananWajib)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SimpananWajib  $simpananWajib
     * @return \Illuminate\Http\Response
     */
    public function edit(SimpananWajib $simpananWajib)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SimpananWajib  $simpananWajib
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SimpananWajib $simpananWajib)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SimpananWajib  $simpananWajib
     * @return \Illuminate\Http\Response
     */
    public function destroy(SimpananWajib $simpananWajib)
    {
        //
    }
}
