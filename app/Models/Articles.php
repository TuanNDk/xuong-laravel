<?php

namespace App\Models;

use App\Models\Rating;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Articles extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = [
        'title',
        'content'
    ];
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'ratingable');
    }
}
