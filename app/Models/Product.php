<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Catelogue;
use App\Models\ProductGallery;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'catelogue_id',
        'name',
        'slug',
        'sku',
        'img_thumbnail',
        'price_regular',
        'price_sale',
        'description',
        'content',
        'views',
        'is_active',
        'is_hot_deal',
        'is_new',
        'is_good_deal',
        'is_show_home',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_hot_deal' => 'boolean',
        'is_new' => 'boolean',
        'is_good_deal' => 'boolean',
        'is_show_home' => 'boolean',
    ];

    public function catelogue()
    {
        return $this->belongsTo(Catelogue::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
