<?php


namespace App\Transformers;

use App\Pengadu;
use League\Fractal\TransformerAbstract;

class PengaduTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'pengaduan'
    ];

    public function transform(Pengadu $pengadu)
    {
        return [
            'id'        => $pengadu->id,
            'nim'       => $pengadu->nim,
            'nama'      => $pengadu->nama,
            'prodi'     => $pengadu->prodi,
            'hp'        => $pengadu->hp,
            'profile'   => $pengadu->profile,
//            'registred' => $pengadu->created_at->diffForHumans(),
        ];
    }

    public function includePengaduan(Pengadu $pengadu)
    {
        $pengaduan = $pengadu->pengaduan()->latestFirst()->get();
        return $this->collection($pengaduan, new PengaduanTransformer);
    }

}

