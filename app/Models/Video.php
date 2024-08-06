<?php

namespace App\Models;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url'
    ];
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'ratingable');
    }
}
