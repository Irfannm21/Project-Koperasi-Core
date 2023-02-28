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
                            <h4>Daftar Pinjaman Emergensi</h4>
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
                                    <a href="{{ route('emergensi.create') }}" class="btn btn-primary mb-3">
                                        Tambah Data
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-responsive-sm table-striped">
                                        <thead>
                                            <th>Kode Anggota</th>
                                            <th>Pinjaman</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah Pinjaman</th>
                                            <th>Tenor</th>
                                            <th>Jumlah Cicilan</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($result as $item)
                                                <tr>
                                                    <td>{{$item->anggota->kode . " " . $item->anggota->nama}}</td>
                                                    <td>Emergensi</td>
                                                    <td>{{date('M y', strtotime($item->tanggal))}}</td>
                                                    <td>Rp. {{number_format($item->jumlah,0,",",".")}}</td>
                                                    <td>{{$item->tenor}}</td>
                                                    <td>Rp. {{number_format($item->cicilan,0,",",".")}}</td>
                                                    <td>
                                                        <a href="{{route('emergensi.edit', $item->id)}}" class="btn btn-xs btn-primary">Ubah</a>
                                                        <form action="{{route('emergensi.destroy',$item->id)}}" method="POST" style="display: inline-block;">
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
