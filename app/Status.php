<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pengaduan;

class Status extends Model
{
    protected $table = 'status';
    protected $fillable = [
        'id', 'status',
    ];

    //relasi
    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }

    public function role_status()
    {
        return $this->belongsTo(role_status::class);
    }


}
