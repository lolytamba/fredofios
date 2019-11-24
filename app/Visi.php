<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visi extends Model
{
    protected $fillable = [
        'isi_visi'
    ];

    protected $dates = [
        'created_at','deleted_at', 'updated_at'
    ];
}
