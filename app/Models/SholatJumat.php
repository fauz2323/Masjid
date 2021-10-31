<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SholatJumat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_akun',
        'imam',
        'keterangan',
        'penanggung_jawab'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'id_akun','id');
    }
}

