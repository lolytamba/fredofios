<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = [
        'gambar','judul','konten','diskripsi'
    ];

    protected $dates = [
        'created_at','deleted_at', 'updated_at'
    ];
}
