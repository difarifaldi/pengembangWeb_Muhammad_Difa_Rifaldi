<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KabupatenKota extends Model
{
    use HasFactory;
    protected $table = 'kabupaten_kota';
    protected $guarded = [];

    public function provinsi()
    {
        return $this->belongsTo(KabupatenKota::class, 'id_provinsi');
    }

    public function userKabupatenKotaAlamat()
    {
        return $this->hasMany(User::class, 'id_kabupaten_kota_alamat');
    }
    public function userKabupatenKotaLahir()
    {
        return $this->hasMany(User::class, 'id_kabupaten_kota_lahir');
    }
}
