<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;
use App\Status;
class role_status extends Model
{
    protected $table = 'role_status';
    protected $fillable = [
        'role_id', 'status_id',
    ];

    public function Role()
    {
        return $this->hasMany(Role::class);
    }

    public function Status()
    {
        return $this->hasMany(Status::class);
    }

}
