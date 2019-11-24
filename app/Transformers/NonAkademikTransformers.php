<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\NonAkademik;

class NonAkademikTransformers extends TransformerAbstract
{

    public function transform(NonAkademik $nonakademik)
    {
        return [
            'id'            => $nonakademik->id,
            'gambar'        => $nonakademik->gambar,
            'judul'         => $nonakademik->judul,
            'keterangan'     => $nonakademik->keterangan,
        ];
    }
}