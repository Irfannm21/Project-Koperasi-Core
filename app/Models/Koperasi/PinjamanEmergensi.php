<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamanEmergensi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pembayarans(){
        return $this->morphMany('App\Models\Koperasi\Pembayaran','pembayaranable');
    }

    public function anggota(){
        return $this->belongsTo('App\Models\Koperasi\Anggota');
    }
}
