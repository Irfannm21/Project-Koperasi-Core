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
                            <h4>Buat Data Pembayaran</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('pembayaran.store') }}">
                                @csrf
                                {{-- <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">Tipe Pembayaran</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="tipe" id="tipe" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="PT">PT (982 ORG)</option>
                                            <option value="Departemen">Departemen (280 Org)</option>
                                            <option value="Perorangan">Perorangan</option>
                                        </select>
                                        @error('jumlah')
                                            <span class="help-block">This is a help text</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">Tanggal</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="date" name="tanggal" class="form-control"
                                            value="{{ old('tanggal') ?? ($result->tanggal ?? '') }}">
                                        @error('tanggal')
                                            <span class="help-block">This is a help text</span>
                                        @enderror
                                    </div>
                                </div> --}}
                                {{-- @include('dashboard.cms_admin.koperasi.pembayaran.form') --}}

                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">Tipe Pinjaman</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="tipe" id="tipe" class="form-control">
                                            <option value="" selected>-- Pilih --</option>
                                            <option value="Individu">USP</option>
                                            <option value="departemen">Konsumsi</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">Metode Pembayaran</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="metode" id="metode" class="form-control">
                                            <option value="" selected>-- Pilih --</option>
                                            <option value="individu">Individu</option>
                                            <option value="departemen">Kelompok</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row" hidden>
                                    <div class="col-md-3">
                                        <label for="" id="labelJenis">Plih Departemen</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="departemen" id="departemen" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="Engineering" id="Engineering">Engineering</option>
                                            <option value="Marketing" id="Marketing">Marketing</option>
                                        </select>
                                        @error('jumlah')
                                            <span class="help-block">This is a help text</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="" id="labelJenis">Pilih Karyawan</label>
                                    </div>
                                    <div class="col-md-4">
                                   <select name="karyawan" id="karyawan" class="form-control">
                                        <option value="" selected>-- Pilih --</option>
                                   </select>
                                        @error('jumlah')
                                            <span class="help-block">This is a help text</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">Tanggal Pembayaran</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="date" class="form-control" id="tanggal">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">Jumlah Bayar</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="bayar" id="bayar" class="form-control">
                                            <option value="" selected>-- Pilih --</option>
                                            <option value="">1x 200000</option>
                                            <option value="">2x 400000</option>
                                            <option value="">3x 600000</option>
                                        </select>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit">Save</button>

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
<script>
    var labelNode = document.getElementById('labelJenis');
    var selectNode = document.getElementById('departemen')
    var selectENGNode = document.getElementById('Engineering')
    var selectMARNode = document.getElementById('Marketing')
    var selectKaryawan = document.getElementById('nama')
    var hasilNode = document.getElementById('hasil')

    var metodeNode = document.getElementById('metode')

    metodeNode.addEventListener("change", () => {
        if(metodeNode.value == "individu") {
            metodeNode.innerHtml = ""
        }
    })

    selectNode.addEventListener("change", () => {
        let request = new XMLHttpRequest();

        request.open("GET", "{{ url('pembayaran/cari-jenis?n=')}}"+selectNode.value, false);
        request.send();
        // hasilNode.innerHtml = request.responseText;

        selectNode.innerHtml = request.responseText;

        console.log(105, JSON.parse(request.response),  )
    })



</script>
@endsection
