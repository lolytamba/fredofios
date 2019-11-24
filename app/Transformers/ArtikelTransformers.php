<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Artikel;

class ArtikelTransformers extends TransformerAbstract
{

    public function transform(Artikel $artikel)
    {
        return [
            'id'        => $artikel->id,
            'gambar'    => $artikel->gambar,
            'judul'     => $artikel->judul,
            'diskripsi'     => $artikel->diskripsi,
            'konten'     => $artikel->konten,
        ];
    }
}