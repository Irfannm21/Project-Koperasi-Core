<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Koperasi\AnggotaKoperasi;
use App\Models\Koperasi\PinjamanEmergensi;

class PinjamanEmergensiTableSeeder extends Seeder
{

    public function run()
    {
        $anggota  = AnggotaKoperasi::find(1);

        $eme = new PinjamanEmergensi;
        $eme->tanggal = "2023-01-01";
        $eme->jumlah = 2000000;
        $eme->tenor = 2;
        $eme->cicilan = 1000000;

        $anggota->emergensis()->save($eme);
    }
}
