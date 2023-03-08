@php
    // dd($html);
@endphp
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
                                    {!! $html->table(['class' => 'table table-bordered'], true) !!}
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
   const tableBody = document.getElementById('dataTableBuilder');
    window.onload = function () {
        let request = new XMLHttpRequest();

        request.open("GET","{{url('/anggota-koperasi/table')}}", false)
        request.send()

        var json = JSON.parse(request.response);

        json.data.forEach(function(obj){
            const row = tableBody.insertRow();
            row.insertCell().textContent = obj.id;
            row.insertCell().textContent = obj.kode;
            row.insertCell().textContent = obj.nama;
            row.insertCell().textContent = obj.departemen;
        })
    }

</script>
@endsection

