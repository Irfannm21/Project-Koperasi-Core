<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Koperasi\AnggotaKoperasi;
use App\Models\Koperasi\SimpananWajib;

class SimpananWajibTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anggota = AnggotaKoperasi::find(1);

        $item = new SimpananWajib;
        $item->tanggal = '2023-01-18';
        $item->jumlah_simpanan = 150000;

        $anggota->simpanan_wajibs()->save($item);
    }
}
