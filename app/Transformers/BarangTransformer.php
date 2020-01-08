<?php

namespace App\Transformers;

use App\Barang;
use League\Fractal\TransformerAbstract;

class BarangTransformer extends TransformerAbstract
{
    public function transform(Barang $barang)
    {
        return [
            'id' => $barang->id,
            'barang' => $barang->barang,
            'published' => $barang->created_at->diffForHumans(),
        ];

    }
}