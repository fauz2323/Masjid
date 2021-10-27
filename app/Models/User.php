<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all of the kultum for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kultum()
    {
        return $this->hasMany(Kultum::class,'id_akun','id');
    }

    public function ceramahAgama()
    {
        return $this->hasMany(CeramahAgama::class,'id_akun','id');
    }

    public function pemasukan()
    {
        return $this->hasMany(Pemasukan::class,'id_akun','id');
    }

    public function pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class,'id_akun','id');
    }

    public function sholatJumat()
    {
        return $this->hasMany(SholatJumat::class,'id_akun','id');
    }
}
