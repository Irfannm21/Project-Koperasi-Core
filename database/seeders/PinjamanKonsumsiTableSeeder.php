<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Koperasi\AnggotaKoperasi;
use App\Models\Koperasi\PinjamanKonsumsi;

class PinjamanKonsumsiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $result = AnggotaKoperasi::find(1);

        $item = new PinjamanKonsumsi;
        $item->tanggal = '2022-01-17';
        $item->jumlah = 1000000;

        $result->konsumsis()->save($item);
    }
}
