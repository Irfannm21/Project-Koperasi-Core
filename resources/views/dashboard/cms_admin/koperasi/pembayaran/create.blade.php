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
                                        <label for="" id="labelJenis">Nama Karyawan</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="nama" id="nama" class="form-control">

                                        </select>
                                        @error('jumlah')
                                            <span class="help-block">This is a help text</span>
                                        @enderror
                                    </div>
                                </div>

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

    const pilih = () => {
        let request = new XMLHttpRequest();
        request.open("GET", "{{ url('pembayaran/cari-jenis') }}", false);
        request.send();
        selectNode.innerHtml = request.responsText;
    }

    console.log(selectNode)

    selectNode.addEventListener("change", pilih)
</script>
@endsection
