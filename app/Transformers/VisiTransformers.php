<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Visi;

class VisiTransformers extends TransformerAbstract
{

    public function transform(Visi $visi)
    {
        return [
            'id'        => $visi->id,
            'isi_visi'  => $visi->isi_visi,
        ];
    }
}