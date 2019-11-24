<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Carousel;

class CarouselTransformers extends TransformerAbstract
{

    public function transform(Carousel $carousel)
    {
        return [
            'id'        => $carousel->id,
            'gambar'    => $carousel->gambar,
            'judul'     => $carousel->judul,
        ];
    }
}