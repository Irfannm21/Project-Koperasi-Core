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
                                @include('dashboard.cms_admin.koperasi.pembayaran.form')
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
            opt += "<option value="+person.id+">"+person.anggota.nama+"</option>";
        })

        anggotaNode.innerHTML = opt;


        console.log(105, JSON.parse(request.response),  )
    })

    var bayarNode = document.getElementById('bayar')
    anggotaNode.addEventListener("change", () => {
        let request = new XMLHttpRequest();
        var data = {
            id : anggotaNode.value,
            tipe : tipeNode.value
        }

        request.open("GET", "{{ url('pembayaran/cari-anggota?cari=')}}"+anggotaNode.value, false);
        request.send();

        var json = JSON.parse(request.response)

        var jumlah = json.cicilan.toLocaleString('id-ID',{style : 'currency', currency : 'IDR'})
        var opt = "";
        for($i=1; $i<=json.tenor; $i++){
            var bayar = json.cicilan*$i;
                bayar = bayar.toLocaleString('id-ID',{style : 'currency', currency : 'IDR'})
            opt += "<option value="+$i+">"+$i+"x "+bayar+"</option>";
        }

        bayarNode.innerHTML = opt;

        console.log("ID USPNYA"+anggotaNode.value);
        console.log(105, JSON.parse(request.response),  )
    });

    // anggotaNode.addEventListener("change", () => {
    //     let request = new XMLHttpRequest();

    //     request.open("GET", "{{ url('pembayaran/cari-id-pinjaman?tipe=')}}"+anggotaNode.value, false);
    //     request.send();

    //     // console.log(data);
    //     // console.log("Jenis Pinjamannya"+tipeNode.value)

    //     console.log(105, JSON.parse(request.response),  )
    // })





</script>
@endsection
