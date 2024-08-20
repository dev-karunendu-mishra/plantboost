<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOption extends Model
{
    use HasFactory;
    protected $fillable = ['pin', 'city', 'state', 'cod', 'prepaid', 'pickup', 'zone'];
}
