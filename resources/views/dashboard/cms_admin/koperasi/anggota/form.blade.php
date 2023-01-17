<div class="form-group row">
    <div class="col-md-3">
        <label for="">Kode</label>
    </div>
    <div class="col-md-4">
        <input type="text" name="kode" class="form-control" value="{{old('kode') ?? $result->kode ?? '' }}">
        @error('kode')
       <span class="invalid-feedback" role="alert">
            {{$message}}
       </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label for="">Nama</label>
    </div>
    <div class="col-md-6">
        <input type="text" name="nama" class="form-control" value="{{old('nama') ?? $result->nama ?? '' }}">
        @error('nama')
        <span class="help-block">This is a help text</span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label for="">Departemen</label>
    </div>
    <div class="col-md-6">
        <select name="departemen" id="departemen" name="departemen" class="form-control">
            <option value="">-- Pilih --</option>
            <option value="Engineering" {{ (old('departemen') || isset($result) ? $result->departemen : '') == "Engineering" ? 'selected' : ''}}>Engineering</option>
            <option value="Marketing" {{ (old('departemen') || isset($result) ? $result->departemen : '') == "Marketing" ? 'selected' : ''}}>Marketing</option>
        </select>
        @error('nama')
        <span class="help-block">This is a help text</span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label for="">Bagian</label>
    </div>
    <div class="col-md-6">
        <select name="bagian" id="bagian" name="bagian" class="form-control">
            <option value="">-- Pilih --</option>
            <option value="IT" {{ (old('departemen') || isset($result) ? $result->bagian : '') == "IT" ? 'selected' : ''}}>IT</option>
            <option value="Administrasi" {{ (old('departemen') || isset($result) ? $result->bagian : '') == "Administrasi" ? 'selected' : ''}}>Administrasi</option>
        </select>
        @error('nama')
        <span class="help-block">This is a help text</span>
        @enderror
    </div>
</div>
<button class="btn btn-primary" type="submit">Save</button>
