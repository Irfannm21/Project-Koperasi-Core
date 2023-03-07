@extends('dashboard.base')

@section('css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Pembayaran</h4>
                        </div>
                        <div class="card-body">
                            @if (Session::has('message'))
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary mb-3">
                                        Tambah Data
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-responsive-sm table-striped">
                                        <thead>
                                            <th>Tanggal</th>
                                            <th>Jenis Pinjaman</th>
                                            <th>Nama Karyawan</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($result as $item)
                                                <tr>
                                                    <td>{{date('m-Y',strtotime($item->tanggal)) ?? ''}}</td>
                                                    <td>
                                                        @if ($item->pembayaranable_type == "App\Models\Koperasi\PinjamanUsp")
                                                            USP
                                                        @elseif ($item->pembayaranable_type == "App\Models\Koperasi\PinjamanEmergensi")
                                                            Emergensi
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->pembayaranable_type == "App\Models\Koperasi\PinjamanUsp")
                                                        {{$item->pembayaranable->anggota->nama ?? ''}}
                                                    @elseif ($item->pembayaranable_type == "App\Models\Koperasi\PinjamanEmergensi")
                                                        {{$item->pembayaranable->anggota->nama ?? ''}}
                                                    @endif
                                                    </td>
                                                    <td>Rp. {{number_format($item->jumlah,0,",",".") ?? ''}}</td>
                                                    <td>
                                                        <a href="{{route('pembayaran.edit', $item->id)}}" class="btn btn-xs btn-primary">Ubah</a>
                                                        <form action="{{route('pembayaran.destroy',$item->id)}}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-xs btn-danger">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('javascript')
@endsection
