<div class="form-group row">
    <div class="col-md-3">
        <label for="">Tipe Simpanan</label>
    </div>
    <div class="col-md-4">
       <select name="tipe" id="tipe" class="form-control">
        <option value="" selected>-- Piih --</option>
        <option value="semua">Semua Karyawan</option>
        <option value="Marketing">Departemen Marketing</option>
        <option value="Engineering">Departemen Engineering</option>
        <option value="IT">Bagian IT</option>
        <option value="Administrasi">Bagian Administrasi</option>
       </select>
        @error('tanggal')
        <span class="help-block">This is a help text</span>
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
    <div class="col-md-4">
        <input type="text" name="jumlah" class="form-control" value="{{old('jumlah') ?? $result->jumlah ?? '' }}">
        @error('jumlah')
        <span class="help-block">This is a help text</span>
        @enderror
    </div>
</div>

<button class="btn btn-primary" type="submit">Save</button>
