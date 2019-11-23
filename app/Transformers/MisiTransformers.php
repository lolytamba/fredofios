<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Misi;

class MisiTransformers extends TransformerAbstract
{

    public function transform(Misi $misi)
    {
        return [
            'id'        => $misi->id,
            'isi_misi'  => $misi->isi_misi,
        ];
    }
}