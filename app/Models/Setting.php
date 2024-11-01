<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'notification', 'notification_2nd', 'estimate_order_ready', 'estimate_order_delivery', 'domain', 'logo', 'icon', 'address', 'email', 'mobile', 'theme_color', 'cod_button_bg', 'facebook', 'twitter', 'linkedin', 'instagram', 'youtube'];
}
