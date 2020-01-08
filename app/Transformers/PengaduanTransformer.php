<?php

namespace App\Transformers;

use App\Pengaduan;
use League\Fractal\TransformerAbstract;
use Illuminate\Support\Facades\DB;
use App\Status;
class PengaduanTransformer extends TransformerAbstract
{

    public function transform(Pengaduan $pengaduan)
    {
        return [
            'pengaduan_id'          => $pengaduan->pengaduan_id,
            'pengadu_id'            => $pengaduan->pengadu_id,
            'ruangan'               => $pengaduan->ruangan,
            'barang'                => $pengaduan->barang,
            'keterangan'            => $pengaduan->keterangan,
            'gambar'                => $pengaduan->gambar,
            // 'status_id'             => $pengaduan->status_id,
             'status'               => $pengaduan->status->{'status'},
            'tindakan'              => $pengaduan->tindakan,
            'published'             => $pengaduan->created_at->diffForHumans(),
           
        ];
    }


}

