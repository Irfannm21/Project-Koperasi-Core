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
                <option value="{{$result->id}}" selected>{{$result->pembayaranable->anggota->kode . " | " . $result->pembayaranable->anggota->nama }}</option>
            @else
            <option value="" selected>-- Pilih --</option>
            @foreach ($anggotas as $item)
                <option value="{{$item->id}}">{{$item->anggota->kode . " | " . $item->anggota->nama}}</option>
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
        <label for="">Tanggal</label>
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
        <label for="">Jumlah</label>
    </div>
    <div class="col-md-6">
        <input type="number" class="form-control" name="jumlah">
        @error('jumlah')
        <span class="help-block">This is a help text</span>
        @enderror
    </div>
</div>
<button class="btn btn-primary" type="submit">Save</button>
