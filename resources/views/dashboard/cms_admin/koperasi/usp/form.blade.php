{{-- @php
    dd($result->anggota->id);
@endphp --}}
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
       <span class="invalid-feedback" role="alert">
            {{$message}}
       </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label for="">Kode / Nama Anggota</label>
    </div>
    <div class="col-md-4">
        <select name="kode" id="kode" class="form-control">
            @if (isset($result))
                <option value="{{$result->anggota_id}}" selected>{{$result->anggota->kode . " | " . $result->anggota->nama}}</option>
            @else
            <option value="" selected>-- Pilih --</option>
            @foreach ($anggotas as $item)
                <option value="{{$item->id}}">{{$item->kode . " | " . $item->nama}}</option>
            @endforeach
            @endif
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
        <label for="">Tanggal Pinjam</label>
    </div>
    <div class="col-md-4">
        <input type="date" name="tanggal" class="form-control" value="{{old('tanggal') ?? $result->tanggal ?? '' }}">
        @error('tanggal')
        <span class="help-block">This is a help text</span>
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
            @for ($i=0; $i<=39; $i++)
                <option value="{{($i*250000)+250000}}" {{ (old('jumlah') || isset($result) ? $result->jumlah : '') == ($i*250000)+500000 ? 'selected' : ''}}>Rp. {{number_format(($i * 250000)+250000,0,",",".")}}</option>
            @endfor
        </select>
        @error('nama')
        <span class="help-block">This is a help text</span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label for="">Tenor</label>
    </div>
    <div class="col-md-6">
        <select name="tenor" id="tenor" name="tenor" class="form-control">
            <option  value="" selected>-- Pilih --</option>
            <option value="1" name="1.025" {{ (old('tenor') || isset($result) ? $result->tenor : '') == $i ? 'selected' : ''}}>1 Bulan</option>
            <option value="2" name="0.51883" {{ (old('tenor') || isset($result) ? $result->tenor : '') == $i ? 'selected' : ''}}>2 Bulan</option>
            <option value="3" name="0.35014" {{ (old('tenor') || isset($result) ? $result->tenor : '') == $i ? 'selected' : ''}}>3 Bulan</option>
            <option value="4" name="0.26582" {{ (old('tenor') || isset($result) ? $result->tenor : '') == $i ? 'selected' : ''}}>4 Bulan</option>
            <option value="5" name="0.21525" {{ (old('tenor') || isset($result) ? $result->tenor : '') == $i ? 'selected' : ''}}>5 Bulan</option>
            <option value="6" name="0.1815" {{ (old('tenor') || isset($result) ? $result->tenor : '') == $i ? 'selected' : ''}}>6 Bulan</option>
            <option value="7" name="0.1564" {{ (old('tenor') || isset($result) ? $result->tenor : '') == $i ? 'selected' : ''}}>7 Bulan</option>
            <option value="8" name="0.1381" {{ (old('tenor') || isset($result) ? $result->tenor : '') == $i ? 'selected' : ''}}>8 Bulan</option>
            <option value="9" name="0.1239" {{ (old('tenor') || isset($result) ? $result->tenor : '') == $i ? 'selected' : ''}}>9 Bulan</option>
            <option value="10" name="0.1125" {{ (old('tenor') || isset($result) ? $result->tenor : '') == $i ? 'selected' : ''}}>10 Bulan</option>
            <option value="11" name="0.1035" {{ (old('tenor') || isset($result) ? $result->tenor : '') == $i ? 'selected' : ''}}>11 Bulan</option>
            <option value="12" name="0.09596" {{ (old('tenor') || isset($result) ? $result->tenor : '') == $i ? 'selected' : ''}}>12 Bulan</option>
            <option value="13" name="0.08955" {{ (old('tenor') || isset($result) ? $result->tenor : '') == $i ? 'selected' : ''}}>13 Bulan</option>
            <option value="14" name="0.08406" {{ (old('tenor') || isset($result) ? $result->tenor : '') == $i ? 'selected' : ''}}>14 Bulan</option>
            <option value="15" name="0.07938" {{ (old('tenor') || isset($result) ? $result->tenor : '') == $i ? 'selected' : ''}}>15 Bulan</option>
            <option value="16" name="0.07474" {{ (old('tenor') || isset($result) ? $result->tenor : '') == $i ? 'selected' : ''}}>16 Bulan</option>
            <option value="17" name="0.07098" {{ (old('tenor') || isset($result) ? $result->tenor : '') == $i ? 'selected' : ''}}>17 Bulan</option>
            <option value="18" name="0.0676" {{ (old('tenor') || isset($result) ? $result->tenor : '') == $i ? 'selected' : ''}}>18 Bulan</option>
        </select>
        @error('nama')
        <span class="help-block">This is a help text</span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label for="">Jumlah Cicilan</label>
    </div>
    <div class="col-md-6">
        <input type="string" class="form-control" name="cicilan" id="cicilan" value="{{old('cicilan') ?? $result->cicilan ?? '' }}" readonly>
        @error('cicilan')
        <span class="help-block">This is a help text</span>
        @enderror
    </div>
</div>
<button class="btn btn-primary" type="submit">Save</button>
