@php
    // dd($result->tenor);
@endphp
{{-- @if (isset($result))
@else
    <div class="form-group row">
        <div class="col-md-3">
            <label for="">Tipe Pinjaman</label>
        </div>
        <div class="col-md-4">

            <select name="kode" id="kode" class="form-control">
                <option value="" selected>-- Pilih --</option>
                <option value="PinjamanUsp">Pinjaman Usp</option>
                <option value="PinjamanEmergensi">Pinjaman Emergensi</option>
                <option value="PinjamanKonsumsi">Pinjaman Konsumsi</option>
            </select>
            @error('kode')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
@endif --}}

<div class="form-group row">
    <div class="col-md-3">
        <label for="">Kode / Nama Anggota</label>
    </div>
    <div class="col-md-4">
        <select name="kode" id="kode" class="form-control select2">
            @if (isset($result))
                <option value="{{ $result->anggota_id }}" selected>
                    {{ $result->anggota->kode . ' | ' . $result->anggota->nama }}</option>
            @else
                <option value="" selected>-- Pilih --</option>
                @foreach ($anggotas as $item)
                    <option value="{{ $item->id }}" {{ old('kode') == $item->id ? 'selected' : '' }}>
                        {{ $item->kode . ' | ' . $item->nama }}</option>
                @endforeach
            @endif
        </select>
        @error('kode')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label for="">Tanggal Pinjam</label>
    </div>
    <div class="col-md-4">
        <input type="date" name="tanggal" class="form-control"
            value="{{ old('tanggal') ?? ($result->tanggal ?? '') }}">
        @error('tanggal')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label for="">Jumlah Pinjam</label>
    </div>
    <div class="col-md-6">
        <select name="jumlah" id="jumlah" name="jumlah" class="form-control">
            <option value="">-- Pilih --</option>
            @for ($i = 0; $i <= 39; $i++)
                <option value="{{ $i * 250000 + 250000 }}" {{$i * 250000 + 250000 == (old("jumlah") ?? ($result->jumlah ?? '') ?? isset($result->jumlah)) ? 'selected' : ''}}> Rp. {{ number_format($i * 250000 + 250000, 0, ',', '.') }}</option>
            @endfor
        </select>
        @error('jumlah')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label for="">Tenor</label>
    </div>
    <div class="col-md-6">
        <select name="tenor" id="tenor" name="tenor" class="form-control">
            <option value="" selected>-- Pilih --</option>
            <option value="1" name="1.025"
                {{1 ==  (old('tenor') ?? ($result->tenor ?? '') ?? isset($result->tenor)) ? 'selected' : '' }}>1 Bulan</option>
            <option value="2" name="0.51883"
                {{2 ==  (old('tenor') ?? ($result->tenor ?? '') ?? isset($result->tenor)) ? 'selected' : '' }}>2 Bulan</option>
            <option value="3" name="0.35014"
                {{3 ==  (old('tenor') ?? ($result->tenor ?? '') ?? isset($result->tenor)) ? 'selected' : '' }}>3 Bulan</option>
            <option value="4" name="0.26582"
                {{4 ==  (old('tenor') ?? ($result->tenor ?? '') ?? isset($result->tenor)) ? 'selected' : '' }}>4 Bulan</option>
            <option value="5" name="0.21525"
                {{5 ==  (old('tenor') ?? ($result->tenor ?? '') ?? isset($result->tenor)) ? 'selected' : '' }}>5 Bulan</option>
            <option value="6" name="0.1815"
                {{6 ==  (old('tenor') ?? ($result->tenor ?? '') ?? isset($result->tenor)) ? 'selected' : '' }}>6 Bulan</option>
            <option value="7" name="0.1564"
                {{7 ==  (old('tenor') ?? ($result->tenor ?? '') ?? isset($result->tenor)) ? 'selected' : '' }}>7 Bulan</option>
            <option value="8" name="0.1381"
                {{8 ==  (old('tenor') ?? ($result->tenor ?? '') ?? isset($result->tenor)) ? 'selected' : '' }}>8 Bulan</option>
            <option value="9" name="0.1239"
                {{9 ==  (old('tenor') ?? ($result->tenor ?? '') ?? isset($result->tenor)) ? 'selected' : '' }}>9 Bulan</option>
            <option value="10" name="0.1125"
                {{10 ==  (old('tenor') ?? ($result->tenor ?? '') ?? isset($result->tenor)) ? 'selected' : '' }}>10 Bulan</option>
            <option value="11" name="0.1035"
                {{11 ==  (old('tenor') ?? ($result->tenor ?? '') ?? isset($result->tenor)) ? 'selected' : '' }}>11 Bulan</option>
            <option value="12" name="0.09596"
                {{12 ==  (old('tenor') ?? ($result->tenor ?? '') ?? isset($result->tenor)) ? 'selected' : '' }}>12 Bulan</option>
            <option value="13" name="0.08955"
                {{13 ==  (old('tenor') ?? ($result->tenor ?? '') ?? isset($result->tenor)) ? 'selected' : '' }}>13 Bulan</option>
            <option value="14" name="0.08406"
                {{14 ==  (old('tenor') ?? ($result->tenor ?? '') ?? isset($result->tenor)) ? 'selected' : '' }}>14 Bulan</option>
            <option value="15" name="0.07938"
                {{15 ==  (old('tenor') ?? ($result->tenor ?? '') ?? isset($result->tenor)) ? 'selected' : '' }}>15 Bulan</option>
            <option value="16" name="0.07474"
                {{16 ==  (old('tenor') ?? ($result->tenor ?? '') ?? isset($result->tenor)) ? 'selected' : '' }}>16 Bulan</option>
            <option value="17" name="0.07098"
                {{17 ==  (old('tenor') ?? ($result->tenor ?? '') ?? isset($result->tenor)) ? 'selected' : '' }}>17 Bulan</option>
            <option value="18" name="0.0676"
                {{18 ==  (old('tenor') ?? ($result->tenor ?? '') ?? isset($result->tenor)) ? 'selected' : '' }}>18 Bulan</option>
        </select>
        @error('tenor')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label for="">Jumlah Cicilan</label>
    </div>
    <div class="col-md-6">
        <input type="string" class="form-control" name="cicilan" id="cicilan"
            value="{{ old('cicilan') ?? ($result->cicilan ?? '') }}" readonly>
        @error('cicilan')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
</div>
<button class="btn btn-primary" type="submit">Save</button>

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
