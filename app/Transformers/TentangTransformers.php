<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Tentang;

class tentangTransformers extends TransformerAbstract
{

    public function transform(Tentang $tentang)
    {
        return [
            'id'            => $tentang->id,
            'isi_tentang'   => $tentang->isi_tentang,
        ];
    }
}