<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';
    protected $fillable = [
        'name',
        'description',
        'price',
        'discount_price',
        'photo',
        'category_id',
        'restaurant_id',
        'is_popular',
        'is_recommend',
        'status'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }
}
