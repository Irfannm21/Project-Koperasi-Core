<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Koperasi\AnggotaKoperasi;

use Faker\Factory as Faker;
class AnggotaKoperasiTableSeeder extends Seeder
{

    public function run()
    {
            $faker = Faker::create('id_ID');

            for($i=0; $i<=10; $i++) {
                $value = new AnggotaKoperasi;
                $value->kode = strtoupper($faker->bothify("??####"));
                $value->nama = $faker->name;
                $value->departemen = "Engineering";
                $value->bagian = "IT";
                $value->save();
            }

    }
}
