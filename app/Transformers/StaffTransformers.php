<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Staff;

class StaffTransformers extends TransformerAbstract
{

    public function transform(Staff $staff)
    {
        return [
            'id'          => $staff->id,
            'gambar'      => $staff->gambar,
            'nama'        => $staff->nama,
            'jabatan'     => $staff->jabatan,
        ];
    }
}