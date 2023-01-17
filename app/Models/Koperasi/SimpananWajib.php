<?php

namespace App\Models\Koperasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpananWajib extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function anggota() {
        return $this->belongsTo('App\Models\Koperasi\AnggotaKoperasi');
    }
}
