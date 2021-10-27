<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kultum extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_akun',
        'ceramah',
        'penanggung_jawab',
        'keterangan'
    ];

    /**
     * Get the user that owns the Kultum
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class,'id_akun','id');
    }
}
