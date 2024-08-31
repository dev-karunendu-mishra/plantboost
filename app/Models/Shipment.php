<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'shipment_id',
        'awb_number',
        'courier_id',
        'courier_name',
        'status',
        'additional_info',
        'payment_type',
        'label',
    ];
}
