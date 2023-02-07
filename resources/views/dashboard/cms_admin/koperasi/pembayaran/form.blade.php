<div class="form-group row">
    <div class="col-md-3">
        <label for="">Metode Pembayaran</label>
    </div>
    <div class="col-md-4">
        <select name="metode" id="metode" class="form-control">
            <option value="" selected>-- Pilih --</option>
            <option value="individu">Individu</option>
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
            <option value="PinjamanUsp">USP</option>
            <option value="PinjamanEmergensi">Emergensi</option>
            <option value="PinjamanKonsumsi">Konsumsi</option>
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
        <input type="date" class="form-control" id="tanggal" name="tanggal">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label for="">Jumlah Bayar</label>
    </div>
    <div class="col-md-4">
        <select name="bayar" id="bayar" class="form-control">

        </select>
    </div>
</div>
<button class="btn btn-primary" type="submit">Save</button>
