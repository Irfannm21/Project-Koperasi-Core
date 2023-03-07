@extends('dashboard.base')

@section('css')

@endsection

@section('content')


<div class="container-fluid">
    <div class="fade-in">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header"><h4>Tambah Data Emergensi</h4></div>
              <div class="card-body">
                  <form method="POST" action="{{ route('emergensi.store') }}">
                      @csrf
                    @include('dashboard.cms_admin.koperasi.emergensi.form')
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection


