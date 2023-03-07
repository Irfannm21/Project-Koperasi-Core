<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamanKonsumsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjaman_konsumsis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anggota_id')->constrained()->onDelete('cascade');
            $table->date('tanggal');
            $table->bigInteger('jumlah');
            $table->timestamps();
            $table->foreign('anggota_id')->references('id')->on('anggota_koperasis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjaman_konsumsis');
    }
}
