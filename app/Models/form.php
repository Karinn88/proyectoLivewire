<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form extends Model
{
    use HasFactory;
    protected $fillable = ['name','email', 'character', 'history','user_id'];
    
    protected $guarded = ['id'];


public function user()
{
    return $this->belongsTo(User::class);
}

}

