@extends('dashboard.base')

@section('css')

@endsection

@section('content')


<div class="container-fluid">
    <div class="fade-in">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header"><h4>Edit {{$result->nama}}</h4></div>
              <div class="card-body">
                  {{-- @if(Session::has('message'))
                      <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                  @endif --}}
                  <form method="POST" action="{{ route('anggota-koperasi.update', $result->id) }}">
                      @csrf
                      @method('PUT')
                    @include('dashboard.cms_admin.koperasi.anggota.form')
                  </form>
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
