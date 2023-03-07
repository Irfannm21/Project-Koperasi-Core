<?php

namespace App\Models\Koperasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKoperasi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function simpanan_wajibs(){
        return $this->hasMany('App\Models\Koperasi\SimpananWajib','anggota_id');
    }

    public function usps(){
        return $this->hasMany('App\Models\Koperasi\PinjamanUsp','anggota_id');
    }

    public function emergensis(){
        return $this->hasMany('App\Models\Koperasi\PinjamanEmergensi','anggota_id');
    }

    public function konsumsis()
    {
        return $this->hasMany('App\Models\Koperasi\PinjamanKonsumsi','anggota_id');
    }

    public function pembayarans(){
        return $this->morphMany('App\Models\Koperasi\Pembayaran','pembayaranable');
    }
}
