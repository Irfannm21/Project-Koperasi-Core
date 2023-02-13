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
                        <label for="" id="total_simpanan"></label>
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
                        <label for="" id="usp"></label>
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
          <div class="col-sm-8">
            <div class="card">
                <div class="card-header"><h4>Daftar Simpanan Wajb</h4></div>
                  <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>jumlah</th>
                                <th>Aksi</th>
                        </thead>
                        <tbody id="tb_wajib">

                        </tbody>
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
<script>
    var anggotaNode = document.getElementById('anggota')
    var kodeNode = document.getElementById('kode')
    var namaNode = document.getElementById('nama')
    var departemenNode = document.getElementById('departemen')
    var bagianNode = document.getElementById('bagian')
    var totalSimpananNode = document.getElementById('total_simpanan')
    var wajibNode = document.getElementById("tb_wajib");
    var uspNode = document.getElementById('usp')
    anggotaNode.addEventListener("change",() => {
        let request = new XMLHttpRequest();

        request.open("GET", "{{url('anggota-koperasi/cari?id=')}}"+anggotaNode.value, false)
        request.send()

        var json = JSON.parse(request.response);
        const total_simpanan = json.anggota.simpanan_wajibs.reduce((n, {jumlah_simpanan}) => n + jumlah_simpanan, 0);
        var total_cicilan = json.usp.pembayarans.reduce((n, {jumlah}) => n + jumlah, 0);
        total_cicilan = total_cicilan / json.usp.te nor

        kodeNode.setAttribute("value",json.anggota.kode)
        namaNode.setAttribute("value",json.anggota.nama)
        departemenNode.setAttribute("value",json.anggota.departemen)
        bagianNode.setAttribute("value",json.anggota.bagian)
        totalSimpananNode.innerHTML = total_simpanan.toLocaleString('id-ID',{style : 'currency', currency : 'IDR'})
        uspNode.innerHTML = total_cicilan
        // var opt = "";
        // json.simpanan_wajibs.forEach(element => {
        //     opt += "<tr>";
        //     opt += "<td>"+element.tanggal+"</td>";
        //     wajibNode.innerHTML += "<td>"+element.tanggal+"</td>";
        //     opt += "</tr>";
        // });

        // wajibNode.innerHTML = opt;
        console.log(json.usp);
        // console.log(105, JSON.parse(request.response), )
    })
</script>
@endsection
