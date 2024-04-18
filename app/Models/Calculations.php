<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculations extends Model
{
    use HasFactory;

    protected $fillable = [
     
        'ingredient_one',
        'ingredient_two',
        'price_one',
        'price_two',
        'product_concern',
        'total_price',
    ];

    
}
