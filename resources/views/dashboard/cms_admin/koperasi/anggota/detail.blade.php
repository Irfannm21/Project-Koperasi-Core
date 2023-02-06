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
                            @foreach ($results as $item)
                                <option value="">{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-3">
                        <label for="">Kode Anggota</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" id="kode" class="form-control" disabled>
                    </div>
                    <div class="col-md-2">
                        <label for="">Total Simpanan Wajib</label>
                    </div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-3">
                        <label for=""><u>Rp. 34.000.000</u></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-3">
                        <label for="">Nama</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" id="nama" class="form-control" disabled>
                    </div>
                    <div class="col-md-2">
                        <label for="">Pinjaman USP</label>
                    </div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-3">
                        <label for=""><u>Lunas</u></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-3">
                        <label for="">Departemen</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" id="departemen" class="form-control" disabled>
                    </div>
                    <div class="col-md-2">
                        <label for="">Pinjaman Emergensi</label>
                    </div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-3">
                        <label for="">Sisa 4x <u>Rp. 430.000</u></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-3">
                        <label for="">Bagian</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" id="nama" class="form-control" disabled>
                    </div>
                    <div class="col-md-2">
                        <label for="">Pinjaman Konsumsi</label>
                    </div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-3">
                        <label for=""><u>Rp 782.000</u></label>
                    </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <table border="2px">
                    <thead>
                        <th>Bulan</th>
                        <th>Jumlah</th>
                    </thead>
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
