@isset($result)
<div class="form-group row" id="anggota_toggle">
    <div class="col-md-3">
        <label for="">Pilih Anggota</label>
    </div>
    <div class="col-md-4">
        <select name="anggota" id="anggota" class="form-control" disabled>
                <option value="">{{$result->pembayaranable->anggota->nama}}</option>
            </select>
            @error('kode')
       <span class="invalid-feedback" role="alert">
            {{$message}}
        </span>
        @enderror
    </div>
</div>
@endisset

<div class="form-group row">
    <div class="col-md-3">
        <label for="">Metode Pembayaran</label>
    </div>
    <div class="col-md-4">
        <select name="metode" id="metode" class="form-control">
            <option value="" selected>-- Pilih --</option>
            <option value="individu" {{ (old('departemen') || isset($result)) ? 'selected' : ''}}>Individu</option>
            <option value="departemen">Kelompok</option>
        </select>
    </div>
</div>


<div class="form-group row">
    <div class="col-md-3">
        <label for="">Tipe Pinjaman</label>
    </div>
    <div class="col-md-4">
        <select name="tipe" id="tipe" class="form-control">
            <option value="" selected>-- Pilih --</option>
            <option value="PinjamanUsp" {{ (old('departemen') || isset($result) ? $result->pembayaranable_type : '') == "App\Models\Koperasi\PinjamanUsp" ? 'selected' : ''}}>USP</option>
            <option value="PinjamanEmergensi" {{ (old('departemen') || isset($result) ? $result->pembayaranable_type : '') == "App\Models\Koperasi\PinjamanEmergensi" ? 'selected' : ''}}>Emergensi</option>
            <option value="PinjamanKonsumsi" {{ (old('departemen') || isset($result) ? $result->pembayaranable_type : '') == "App\Models\Koperasi\PinjamanKonsumsi" ? 'selected' : ''}}>Konsumsi</option>
        </select>
    </div>
</div>

<div class="form-group row" id="departemen_toggle" hidden>
    <div class="col-md-3">
        <label for="" id="labelJenis">Plih Departemen</label>
    </div>
    <div class="col-md-4">
        <select name="departemen" id="departemen" class="form-control">
            <option value="">-- Pilih --</option>
            <option value="Engineering" id="Engineering">Engineering</option>
            <option value="Marketing" id="Marketing">Marketing</option>
        </select>
        @error('jumlah')
            <span class="help-block">This is a help text</span>
        @enderror
    </div>
</div>
<div class="form-group row" id="anggota_toggle" hidden>
    <div class="col-md-3">
        <label for="">Pilih Anggota</label>
    </div>
    <div class="col-md-4">
        <select name="anggota" id="anggota" class="form-control">
            @isset($result)
                <option value="">{{$result->pembayaranable->anggota->nama}}</option>
            @endisset
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
        <label for="">Tanggal Pembayaran</label>
    </div>
    <div class="col-md-4">
        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{old('tanggal') ?? $result->tanggal ?? '' }}">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label for="">Jumlah Bayar</label>
    </div>
    <div class="col-md-4">
        <select name="bayar" id="bayar" class="form-control">
            @isset($result)
                @for ($i=1; $i <= $result->pembayaranable->tenor; $i++)
                    <option value="{{$result->pembayaranable->cicilan*$i}}"
                        {{ (old('jumlah') || isset($result) ? $result->jumlah : '') === $result->pembayaranable->cicilan*$i ? 'selected' : ''}}>
                        {{$i . "x " . number_format($result->pembayaranable->cicilan*$i,2,",",".")}}
                    </option>
                @endfor
            @endisset
        </select>
    </div>
</div>
<button class="btn btn-primary" type="submit">Save</button>
