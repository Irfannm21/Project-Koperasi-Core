@extends('dashboard.base')

@section('css')

@endsection

@section('content')


<div class="container-fluid">
    <div class="fade-in">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header"><h4>Detail Data Anggota</h4></div>
              <div class="card-body">
                  <div class="form-group row">
                    <div class="col-md-3">
                        <label for="">Cari Anggota</label>
                    </div>
                    <div class="col-md-3">
                        <select name="" id="" class="form-control">
                            <option value="" selected>-- Pilih --</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-3">
                        <label for="">Nama</label>
                    </div>1
                    <div class="col-md-3">
                        <input type="text" value="Irfan" class="form-control" disabled>
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
