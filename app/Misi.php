<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Misi extends Model
{
    protected $fillable = [
        'isi_misi'
    ];

    protected $dates = [
        'created_at','deleted_at', 'updated_at'
    ];
}
