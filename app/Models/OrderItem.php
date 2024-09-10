<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'food_id',
        'name',
        'photo',
        'quantity',
        'price',
        'item_total_price',
        'status'
    ];
}
