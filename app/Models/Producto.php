<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_product',
        'description',
        'price',
        'stock',
        'unit_price',
        'brand',
        'image',
    ];
}
