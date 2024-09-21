<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'mobile', 'address_line_one', 'address_line_two', 'pin', 'city', 'state', 'product_id', 'package_id', 'selected_attributes', 'client_ip', 'source'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected $casts = [
        'selected_attributes' => 'array', // Automatically cast JSON to an array
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            // Fetch the last order
            $lastOrder = Order::orderBy('id', 'desc')->first();

            // Set the initial order ID
            $nextOrderId = 'PLB1001'; // Default order ID if no records exist

            // If there is a last order, increment the numeric part of the order_id
            if ($lastOrder) {
                // Extract the numeric part, increment it and append it to '#PLB'
                $lastOrderId = intval(str_replace('PLB', '', $lastOrder->order_id));
                $nextOrderId = 'PLB'.($lastOrderId + 1);
            }

            // Assign the custom order ID to the new order
            $order->order_id = $nextOrderId;
        });
    }
}
