<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = ['description', 'user_id', 'post_id'];
    use HasFactory;

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // relation with post modal
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
