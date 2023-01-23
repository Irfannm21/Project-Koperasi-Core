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
                                        <label for="">Jenis Pinjaman</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="jenis" id="jenis" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="EUSP">USP</option>
                                            <option value="EEME">Emergensi</option>
                                            <option value="KONS">Konsumsi</option>
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


@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('change', '#jenis', function() {
                $.ajax({
                    method: "GET",
                    url: '{{ url('/pembayaran/cari-jenis') }}',
                    data: {
                        nama: $(this).val()
                    },
                    success: function(response) {
                        console.log(204, response);
                        for (let item of response) {

                        }
                    }
                })
            })
        })
    </script>
@endsection


@endsection

@section('javascript')
@endsection
