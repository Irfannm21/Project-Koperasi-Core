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
                                {{-- @include('dashboard.cms_admin.koperasi.pembayaran.form') --}}

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

                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="">Tipe Pinjaman</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="tipe" id="tipe" class="form-control">
                                            <option value="" selected>-- Pilih --</option>
                                            <option value="PinjamanUsp">USP</option>
                                            <option value="PinjamanEmergensi">Emergensi</option>
                                            <option value="PinjamanKonsumsi">Konsumsi</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row" id="departemen_toggle" hidden>
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
                                <div class="form-group row" id="anggota_toggle" hidden>
                                    <div class="col-md-3">
                                        <label for="">Pilih Anggota</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="anggota" id="anggota" class="form-control">

                                        </select>
                                        @error('kode')
                                       <span class="invalid-feedback" role="alert">
                                            {{$message}}
                                       </span>
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
    var karyawanNode = document.getElementById('data_karyawan');

    var tipeNode = document.getElementById('tipe')
    var anggotaNode = document.getElementById('anggota')
    tipeNode.addEventListener("change", () => {
        let request = new XMLHttpRequest();
        request.open("GET", "{{ url('pembayaran/tipe-pinjaman?tipe=')}}"+tipeNode.value, false);
        request.send();

        var json = JSON.parse(request.response);

        // console.log(json[0].nama);
        let opt = "";
        opt += "<option selected>-- Pilih -- </option>";
        json.forEach(function(person) {
            opt += "<option>"+person.anggota.nama+"</option>";
        })
        anggotaNode.innerHTML = opt;

        console.log(105, JSON.parse(request.response),  )
    })

    // anggotaNode.addEventListener("change", () => {
    //     let request = new XMLHttpRequest();

    //     request.open("GET", "{{ url('pembayaran/cari-id-pinjaman?nama=')}}"+anggotaNode.value, false);
    //     request.send();

    //     console.log(anggotaNode.value);
    //     console.log(105, JSON.parse(request.response),  )
    // })

    var metodeNode = document.getElementById('metode')
    var dept_toggle = document.getElementById('departemen_toggle');
    var anggotaToggleNode = document.getElementById('anggota_toggle');
    metodeNode.addEventListener("change", () => {
        if(metodeNode.value == "individu") {
            anggotaToggleNode.removeAttribute('hidden');
            dept_toggle.setAttribute("hidden","hidden");
        } else {
            dept_toggle.removeAttribute('hidden');
            anggotaToggleNode.setAttribute("hidden","hidden");
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
