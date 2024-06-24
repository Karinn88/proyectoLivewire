<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostEsther extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'description',
        'user_id',
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($project) {
            $project->user_id = auth()->id();
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $table = 'post_esthers';
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function isLikedByUser($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }
}
