<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\role_status;
class Role extends Model
{
    protected $primaryKey = 'role_id';
    protected $table = 'role';
    protected $fillable = [
        'role_id', 'role',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function role_status()
    {
        return $this->belongsTo(role_status::class);
    }


}
