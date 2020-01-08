<?php


namespace App\Transformers;

use App\Pengadu;
use League\Fractal\TransformerAbstract;

class StatusTransformer extends TransformerAbstract
{
    public function transform(Status $status)
    {
        return [
            'id'        => $pengadu->id,
            'status'    => $pengadu->nim,
        ];
    }

}

