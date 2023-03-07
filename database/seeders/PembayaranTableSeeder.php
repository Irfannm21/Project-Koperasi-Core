<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Koperasi\AnggotaKoperasi;
use App\Models\Koperasi\PinjamanKonsumsi;
use App\Models\Koperasi\PinjamanUsp;
use App\Models\Koperasi\PinjamanEmergensi;
use App\Models\Koperasi\Pembayaran;

class PembayaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $usp = PinjamanKonsumsi::find(1);

        // $usp->pembayarans()->createMany([
        //     [
        //         "tanggal" => '2023-01-18',
        //         'jumlah' => 100000
        //     ]
        //     ]);

        $usp = PinjamanKonsumsi::find(1);
        // dd($usp->all());

        $usp->pembayarans()->createMany([
            [
                "tanggal"  => "2023-02-23",
                "jumlah" => 700000,
            ]
            ]);
    }
}
