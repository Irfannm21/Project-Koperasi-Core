@extends('dashboard.base')

@section('css')

@endsection

@section('content')


<div class="container-fluid">
    <div class="fade-in">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header"><h4>Edit data USP {{$result->anggota->nama}}</h4></div>
              <div class="card-body">
                  <form method="POST" action="{{ route('usp.update', $result->id) }}">
                      @csrf
                      @method('PUT')
                    @include('dashboard.cms_admin.koperasi.usp.form')
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
