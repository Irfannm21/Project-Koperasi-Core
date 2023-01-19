{{-- @php
    dd($result->anggota->id);
@endphp --}}
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
            @for ($i=0; $i<=38; $i++)
                <option value="{{($i*250000)+500000}}" {{ (old('jumlah') || isset($result) ? $result->jumlah : '') == ($i*250000)+500000 ? 'selected' : ''}}>Rp. {{number_format(($i * 250000)+500000,0,",",".")}}</option>
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
            <option value="" selected>-- Pilih --</option>
            @for ($i=1; $i<=18; $i++)
            <option value="{{$i}}" {{ (old('tenor') || isset($result) ? $result->tenor : '') == $i ? 'selected' : ''}}>{{$i}} Bulan</option>
            @endfor
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
        <input type="number" class="form-control" name="cicilan" value="{{old('cicilan') ?? $result->cicilan ?? '' }}">
        @error('cicilan')
        <span class="help-block">This is a help text</span>
        @enderror
    </div>
</div>
<button class="btn btn-primary" type="submit">Save</button>
