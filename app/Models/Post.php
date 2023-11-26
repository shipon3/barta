<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'image', 'uuid', 'user_id'];
    /**
     * relation with user model
     *  */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * relation with comment model 
     */
    public function comments(): HasOneOrMany
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
