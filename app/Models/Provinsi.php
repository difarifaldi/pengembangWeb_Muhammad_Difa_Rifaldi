<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';
    public function kabupatenKotaAlamat()
    {
        return $this->hasMany(KabupatenKota::class, 'id_provinsi_alamat');
    }
    public function kabupatenKotaLahir()
    {
        return $this->hasMany(KabupatenKota::class, 'id_provinsi_lahir');
    }

    public function userProvinsiLahir()
    {
        return $this->hasMany(User::class, 'id_provinsi_lahir');
    }
    public function userProvinsiAlamat()
    {
        return $this->hasMany(User::class, 'id_provinsi_alamat');
    }
}
