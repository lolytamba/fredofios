<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NonAkademik extends Model
{
    protected $fillable = [
        'gambar','judul', 'keterangan'
    ];

    protected $dates = [
        'created_at','deleted_at', 'updated_at'
    ];
}