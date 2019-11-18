<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Galeri;

class GaleriTransformers extends TransformerAbstract
{

    public function transform(Galeri $galeri)
    {
        return [
            'id'        => $galeri->id,
            'gambar'    => $galeri->gambar,
            'judul'     => $galeri->judul,
        ];
    }
}