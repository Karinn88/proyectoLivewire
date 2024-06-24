<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_User extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'role_id'];
    protected $table = 'role_user';

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(User::class);
    }
}
