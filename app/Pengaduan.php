<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pengadu;
use App\Status;

class Pengaduan extends Model
{
    //
    protected $primaryKey = 'pengaduan_id';
    protected $table = 'pengaduan';
    protected $fillable = [
        'pengaduan_id', 'pengadu_id', 'ruangan', 'barang', 'keterangan', 'gambar', 'status_id', 'tindakan', 'created_at'
    ];

    //menampilkan data pengaduan terbaru
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('pengaduan_id', 'DESC');
    }

    public function pengadu()
    {
        return $this->belongsTo(Pengadu::class);
    }

    public function status()
    {
        return $this->belongsTo(status::class);
    }
}
