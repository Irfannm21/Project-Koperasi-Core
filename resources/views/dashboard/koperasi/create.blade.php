@extends('dashboard.base')

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Create new role</h4></div>
            <div class="card-body">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
                <form method="POST" action="{{ route('anggota-koperasi.store') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="">Kode</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="kode" class="form-control">
                            @error('kode')
                            <span class="help-block">This is a help text</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="">Nama</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="nama" class="form-control">
                            @error('nama')
                            <span class="help-block">This is a help text</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="">Departemen</label>
                        </div>
                        <div class="col-md-6">
                            <select name="departemen" id="departemen" name="departemen" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="Engineering">Engineering</option>
                                <option value="Marketing">Marketing</option>
                            </select>
                            @error('nama')
                            <span class="help-block">This is a help text</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="">Bagian</label>
                        </div>
                        <div class="col-md-6">
                            <select name="bagian" id="bagian" name="bagian" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="IT">IT</option>
                                <option value="Administrasi">Administrasi</option>
                            </select>
                            @error('nama')
                            <span class="help-block">This is a help text</span>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a class="btn btn-primary" href="{{ route('roles.index') }}">Return</a>
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
