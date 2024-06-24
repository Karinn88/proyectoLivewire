<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission_User extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'permission_id'];

    protected $table = 'permission_user';
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
 