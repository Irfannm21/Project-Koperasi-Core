@extends('dashboard.base')

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Anggota Koperasi</h4></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="" style="float: left;">
                            <a class="btn btn-primary mt-2" href="{{route('anggota-koperasi.create')}}">
                                Tambah Anggota
                            </a>
                        </div>
                    </div>
                </div>
                <br>
                <table class="table table-striped table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Departemen</th>
                            <th>Bagian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($anggota as $value)
                            <tr>
                                <td>
                                    {{ $value->kode }}
                                </td>
                                <td>
                                    {{ $value->nama }}
                                </td>
                                <td>
                                    {{ $value->departemen }}
                                </td>
                                <td>
                                    {{ $value->bagian }}
                                </td>
                                <td>
                                   {{-- <a href="{{route('anggota-koperasi.edit')}}" class="btn btn-primary">Edit</a> --}}
                                    {{-- <form action="{{ route('anggota-koperasi.destroy',[ $value->id] ) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">Delete</button>
                                    </form> --}}

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

@endsection

@section('javascript')

@endsection
