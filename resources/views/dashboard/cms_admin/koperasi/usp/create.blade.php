@extends('dashboard.base')

@section('css')

@endsection

@section('content')


<div class="container-fluid">
    <div class="fade-in">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header"><h4>Tambah Data USP</h4></div>
              <div class="card-body">
                  <form method="POST" action="{{ route('usp.store') }}">
                      @csrf
                    @include('dashboard.cms_admin.koperasi.usp.form')
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
    var jumlahNode = document.getElementById('jumlah');
    var tenorNode = document.getElementById('tenor')
    var cicilanNode = document.getElementById('cicilan')
    tenorNode.addEventListener("change", () => {
        const selectedOpt = event.target.options[event.target.selectedIndex]
        const hasil = selectedOpt.getAttribute('name')

        var cicilan = parseInt(jumlahNode.value, 0) * Math.round(hasil * 100000)/100000

            cicilan = Math.ceil(cicilan).toLocaleString('id-ID',{style : 'currency', currency : 'IDR', minimumFractionDigits: 0, maximumFractionDigits: 0,})
        cicilanNode.setAttribute("value", cicilan)
    console.log(jumlahNode.value )
})

jumlahNode.addEventListener("change", () => {
        cicilanNode.setAttribute("value", "-- Pilih Tenor Kembali --")
        // console.log(tenorNode)
})
</script>
@endsection
