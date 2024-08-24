<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function provinsiAlamat()
    {
        return $this->belongsTo(Provinsi::class, 'id_provinsi_alamat');
    }
    public function provinsiLahir()
    {
        return $this->belongsTo(Provinsi::class, 'id_provinsi_lahir');
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id_agama');
    }
    public function kabupatenKotaAlamat()
    {
        return $this->belongsTo(KabupatenKota::class, 'id_kabupaten_kota_alamat');
    }
    public function kabupatenKotaLahir()
    {
        return $this->belongsTo(KabupatenKota::class, 'id_kabupaten_kota_lahir');
    }
}
