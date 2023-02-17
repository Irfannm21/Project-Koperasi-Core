@extends('dashboard.base')

@section('css')

@endsection

@section('content')
<div class="container-fluid">
    <div class="fade-in">
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-header"><h4>Detail Data Anggota</h4></div>
              <div class="card-body">
                  <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Cari Anggota</label>
                    </div>
                    <div class="col-md-6">
                        <select name="" id="anggota" class="form-control">

                            <option value="" selected>-- Pilih --</option>
                            @foreach ($results as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Kode Anggota</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="kode" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Nama</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="nama" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Departemen</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="departemen" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Bagian</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="bagian" class="form-control" disabled>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
                <div class="card-header"><h4>Data Simpanan Wajib</h4></div>
                  <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                                <th>Nama</th>
                                <th>Jumlah</th>
                        </thead>
                        <tbody id="tb_wajib">

                        </tbody>
                        </table>
                  </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h4 class="text-center">Data USP</h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5 class="text-center">Data Pinjaman</h5>
                            <table class="table table-responsive-sm table-striped">
                              <thead>
                                <th>Tanggal Pinjam</th>
                                <th>Jumlah</th>
                                <th>Tenor</th>
                                <th>Jumlah cicilan</th>
                                <th>Keterangan</th>
                              </thead>
                              <tbody id="tb_usp">

                              </tbody>

                            </table>
                        </div>
                        <div class="col-sm-6">
                            <h5 class="text-center">Data pembayaran</h5>
                            <table class="table table-responsive-sm table-striped">
                              <thead>
                                <th>Tanggal Bayar</th>
                                <th>Jumlah</th>
                              </thead>
                              <tbody id="tb_usp_bayar">

                              </tbody>

                            </table>
                        </div>

                    </div>


                </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h4 class="text-center">Data Emergensi</h4></div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <h5>Data Pinjaman</h5>
                        <table class="table table-responsive-sm table-striped">
                          <thead>
                            <th>Tanggal Pinjam</th>
                            <th>Jumlah</th>
                            <th>Tenor</th>
                            <th>Jumlah cicilan</th>
                          </thead>
                          <tbody id="tb_emergensi">

                          </tbody>
                        </table>
                      </div>
                      <div class="col-sm-6">
                        <h5 class="text-center">Data pembayaran</h5>
                        <table class="table table-responsive-sm table-striped">
                          <thead>
                            <th>Tanggal Bayar</th>
                            <th>Jumlah</th>
                          </thead>
                          <tbody id="tb_emergensi_bayar">

                          </tbody>

                        </table>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h4>Data Konsumsi</h4></div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <h5>Data Pinjaman</h5>
                        <table class="table table-responsive-sm table-striped">
                          <thead>
                            <th>Tanggal Pinjam</th>
                            <th>Jumlah</th>
                          </thead>
                          <tbody id="tb_konsumsi">

                          </tbody>
                        </table>
                      </div>
                      <div class="col-sm-6">
                        <h5 class="text-center">Data pembayaran</h5>
                        <table class="table table-responsive-sm table-striped">
                          <thead>
                            <th>Tanggal Bayar</th>
                            <th>Jumlah</th>
                          </thead>
                          <tbody id="tb_bayar_konsumsi">

                          </tbody>

                        </table>
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
    var wajibNode = document.getElementById("tb_wajib");
    var uspNode = document.getElementById('usp')
    var tanggalSimpananNode = document.getElementById("tanggal_simpanan");
    var jumlahSimpananNode = document.getElementById('jumlah_simpanan')
    var tbUspNode = document.getElementById('tb_usp')
    var tbUspNodeBayar = document.getElementById('tb_usp_bayar')
    var tbEmeNode = document.getElementById('tb_emergensi')
    var tbKonsNode = document.getElementById('tb_konsumsi')
    anggotaNode.addEventListener("change",() => {
        let request = new XMLHttpRequest();

        request.open("GET", "{{url('anggota-koperasi/cari?id=')}}"+anggotaNode.value, false)
        request.send()

        var json = JSON.parse(request.response);
        var total_simpanan = json.anggota.simpanan_wajibs.reduce((n, {jumlah_simpanan}) => n + jumlah_simpanan, 0);



        kodeNode.setAttribute("value",json.anggota.kode)
        namaNode.setAttribute("value",json.anggota.nama)
        departemenNode.setAttribute("value",json.anggota.departemen)
        bagianNode.setAttribute("value",json.anggota.bagian)

        total_simpanan = total_simpanan.toLocaleString('id-ID',{style : 'currency', currency : 'IDR'})

        // tmkNode.innerHTML = json.anggota.created_at
        // uspNode.innerHTML = total_cicilan

        var opt = ""
        json.anggota.simpanan_wajibs.forEach(element => {
              opt += "<tr>"
              opt += "<td>"+element.tanggal+"</td>"
              opt += "<td>"+element.jumlah_simpanan.toLocaleString('id-ID',{style : 'currency', currency : 'IDR'})+"</td>"
              opt += "</tr>";
        });
            opt += "<tr>"
            opt += "<td>Total Simpanan : </td>"
            opt += "<td>"+total_simpanan+"<td>"
            opt += "</tr>"
        wajibNode.innerHTML = opt;

        var tb_usp = ""
        json.usp.forEach(element => {
          var total_bayar = element.pembayarans.reduce((n, {jumlah}) => n + jumlah, 0);
            total_bayar = total_bayar / element.cicilan

            if(total_bayar >= element.tenor) {
              hasil = "Lunas"
            } else {
              hasil = element.tenor - total_bayar
              hasil = "Sisa : " + hasil+" x"
          }
          tb_usp += "<tr>"
            tb_usp += "<td>"+element.tanggal+"</td>"
            tb_usp += "<td>"+element.jumlah+"</td>"
            tb_usp += "<td>"+element.tenor+"</td>"
            tb_usp += "<td>"+element.cicilan+"</td>"
             tb_usp += "<td>"+hasil+"</td>"
            tb_usp += "</tr>"
        });
        tbUspNode.innerHTML = tb_usp



        var tr_usp_bayar = ""
        json.usp.forEach(element => {
            element.pembayarans.forEach(value => {
                tr_usp_bayar += "<tr>"
                tr_usp_bayar += "<td>"+value.tanggal+"</td>"
                tr_usp_bayar += "<td>"+value.jumlah+"</td>"
                tr_usp_bayar += "</tr>"
            })
        });
        tbUspNodeBayar.innerHTML = tr_usp_bayar


        var tb_eme = ""
        json.emergensi.forEach(element => {
            tb_eme += "<tr>"
            tb_eme += "<td>"+element.tanggal+"</td>"
            tb_eme += "<td>"+element.jumlah+"</td>"
            tb_eme += "<td>"+element.tenor+"</td>"
            tb_eme += "<td>"+element.cicilan+"</td>"
            tb_eme += "</tr>"
        });
        tbEmeNode.innerHTML = tb_eme


        var tb_kon = ""
        json.konsumsi.forEach(element => {
            tb_kon += "<tr>"
            tb_kon += "<td>"+element.tanggal+"</td>"
            tb_kon += "<td>"+element.jumlah+"</td>"
            tb_kon += "</tr>"
        });
        tbKonsNode.innerHTML = tb_kon





        console.log(json.usp);
        // console.log(105, JSON.parse(request.response), )
    })
</script>
@endsection
