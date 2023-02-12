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
                        <select name="" id="anggota" class="form-control">

                            <option value="" selected>-- Pilih --</option>
                            @foreach ($results as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
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
                        <input type="text" id="bagian" class="form-control" disabled>
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
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

@endsection

@section('javascript')
<script>
    var anggotaNode = document.getElementById('anggota')
    var kodeNode = document.getElementById('kode')
    var namaNode = document.getElementById('nama')
    var departemenNode = document.getElementById('departemen')
    var bagianNode = document.getElementById('bagian')
    anggotaNode.addEventListener("change",() => {
        let request = new XMLHttpRequest();

        request.open("GET", "{{url('anggota-koperasi/cari?id=')}}"+anggotaNode.value, false)
        request.send()

        var json = JSON.parse(request.response);

        kodeNode.setAttribute("value",json.kode)
        namaNode.setAttribute("value",json.nama)
        departemenNode.setAttribute("value",json.departemen)
        bagianNode.setAttribute("value",json.bagian)
        var sum = 0;
        for (const object of json.simpanan_wajibs) {
           var number = object.jumlah_simpanan
            sum += number
        }
        // const sum = json.simpanan_wajibs.jumlah_simpanan;

        console.log(number);
        // console.log(json.simpanan_wajibs)
        console.log(105, JSON.parse(request.response), )
    })
</script>
@endsection
