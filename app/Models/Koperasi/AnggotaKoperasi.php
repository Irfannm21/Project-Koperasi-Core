<?php

namespace App\Models\Koperasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKoperasi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function simpanan_wajibs(){
        return $this->hasMany('App\SimpananWajib');
    }

    public function pinjaman_usps(){
        return $this->hasMany('App\Models\Koperasi\PinjamanUsp');
    }

    public function pinjaman_emergensis(){
        return $this->hasMany('App\Models\Koperasi\PinjamanEmergensi');
    }

    public function pinjaman_konsumsis()
    {
        return $this->hasMany('App\Models\Koperasi\PinjamanKonsumsi');
    }

    public function pembayarans(){
        return $this->morphMany('App\Models\Koperasi\Pembayaran','pembayaranable');
    }
}
