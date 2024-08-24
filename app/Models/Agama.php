<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;
    protected $table = 'agama';
    protected $guarded = [];

    public function userAgama()
    {
        return $this->hasMany(User::class, 'id_agama');
    }
}
