<?php

namespace App;



use Illuminate\Database\Eloquent\Model;
use App\Pengaduan;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Pengadu extends Authenticatable
{
    protected $table = 'pengadu';
    protected $fillable = [
        'id', 'nim', 'nama', 'password', 'hp', 'prodi', 'profile', 'status',
    ];

    //relasi
    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }
}
