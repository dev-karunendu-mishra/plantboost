<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'title', 'file_path', 'file_type'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
