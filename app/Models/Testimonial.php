<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'name', 'description', 'profile'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
