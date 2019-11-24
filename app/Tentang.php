<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    protected $fillable = [
        'isi_tentang'
    ];

    protected $dates = [
        'created_at','deleted_at', 'updated_at'
    ];
}
