<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = [
        'gambar','judul'
    ];

    protected $dates = [
        'created_at','deleted_at', 'updated_at'
    ];
}
