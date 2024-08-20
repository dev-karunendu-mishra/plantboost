<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'old_price', 'offer', 'reviews', 'rating', 'seo_title', 'seo_keywords', 'seo_description'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

}
