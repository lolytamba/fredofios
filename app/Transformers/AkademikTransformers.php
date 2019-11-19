<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Akademik;

class AkademikTransformers extends TransformerAbstract
{

    public function transform(Akademik $akademik)
    {
        return [
            'id'            => $akademik->id,
            'gambar'        => $akademik->gambar,
            'judul'         => $akademik->judul,
            'keterangan'    =>$akademik->keterangan,
        ];
    }
}