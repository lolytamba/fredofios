<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'gambar','nama', 'jabatan'
    ];

    protected $dates = [
        'created_at','deleted_at', 'updated_at'
    ];
}
