<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Fasilitas;

class FasilitasTransformers extends TransformerAbstract
{

    public function transform(Fasilitas $fasilitas)
    {
        return [
            'id'        => $fasilitas->id,
            'gambar'    => $fasilitas->gambar,
            'judul'     => $fasilitas->judul,
        ];
    }
}