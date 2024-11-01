<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'courier_partner_title', 'description', 'price', 'old_price', 'offer', 'reviews', 'rating', 'pixel_id', 'product_url', 'seo_title', 'seo_keywords', 'seo_description'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');

    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    public function sliders()
    {
        return $this->hasMany(Slider::class);
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
