<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Koperasi\AnggotaKoperasi;
use App\Models\Koperasi\PinjamanUsp;

class PinjamanUspTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anggota = AnggotaKoperasi::find(1);

        $usp = new PinjamanUsp;
        $usp->tanggal = '2023-01-01';
        $usp->jumlah = 2000000;
        $usp->tenor = 2;
        $usp->cicilan = 1120000;

        $anggota->usps()->save($usp);
    }
}
