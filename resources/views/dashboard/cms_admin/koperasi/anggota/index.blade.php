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
                            <h4>Daftar Anggota Koperasi</h4>
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
                                    <a href="{{ route('anggota-koperasi.create') }}" class="btn btn-primary mb-3">
                                        Tambah Data
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-responsive-sm table-striped">
                                        <thead>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Departemen</th>
                                            <th>Bagian</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($results as $item)
                                            <tr>
                                                <td>
                                                    {{$item->kode ?? ''}}
                                                </td>
                                                <td>
                                                    {{$item->nama ?? ''}}
                                                </td>
                                                <td>
                                                    {{$item->departemen ?? ''}}
                                                </td>
                                                <td>
                                                    {{$item->bagian ?? ''}}
                                                </td>
                                                <td>
                                                    <a href="{{route('anggota-koperasi.edit', $item->id)}}" class="btn btn-xs btn-primary">Ubah</a>
                                                    <form action="{{route('anggota-koperasi.destroy',$item->id)}}" method="POST" style="display: inline-block;">
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
<script>

</script>
@endsection
