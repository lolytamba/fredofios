<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $fillable = [
        'nama',  'nohp', 'email', 'pesan'
    ];
}