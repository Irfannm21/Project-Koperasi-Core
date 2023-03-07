<div class="form-group row">
    <div class="col-md-3">
        <label for="">Kode / Nama Anggota</label>
    </div>
    <div class="col-md-4">
        <select name="kode" id="kode" class="form-control">
                @if (isset($result))
                    <option value="{{ $result->anggota_id }}" selected>
                        {{ $result->anggota->kode . ' | ' . $result->anggota->nama }}</option>
                @else
                    <option value="" selected>-- Pilih --</option>
                    @foreach ($results as $item)
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
        <input type="text" class="form-control" name="jumlah" id="JumlahKonsumsi"
            value="{{ old('jumlah') ?? ($result->jumlah ?? '') }}">
        @error('jumlah')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
</div>
<button class="btn btn-primary" type="submit">Save</button>

@section('javascript')
    <script>
        var JumlahKonsumsiNode = document.getElementById('JumlahKonsumsi')

        JumlahKonsumsiNode.addEventListener("keyup", function(e) {
            JumlahKonsumsiNode.value = formatRupiah(this.value, 'Rp. ');
        })

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '',
                    rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '')
        }
    </script>
@endsection
