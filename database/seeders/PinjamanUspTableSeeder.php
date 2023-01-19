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

        $anggota->usps()->update([
            "tanggal" => '2022-10-10',
            "jumlah" => 2000000,
            "tenor" => 4,
            "cicilan" => 500000
        ]);
    }
}
