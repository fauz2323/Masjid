<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sholat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_akun',
        'imam',
        'WaktuSholat',
        'penanggung_jawab'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'id_akun','id');
    }
}
