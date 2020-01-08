<?php

namespace App\Transformers;

use App\Ruangan;
use League\Fractal\TransformerAbstract;


class RuanganTransformer extends TransformerAbstract
{
    public function transform(Ruangan $ruangan)
    {
        return [
            'id' => $ruangan->id,
            'ruangan' => $ruangan->ruangan,
            'published' => $ruangan->created_at->diffForHumans(),
        ];
    }
}

