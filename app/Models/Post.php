<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'body',
        'published_at',
    ];

    public function user() : BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function votedUsers() {
        return $this->belongsToMany(User::class, 'votes');
    }

    public function topic() : BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }
}
