<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductToColor extends Model{
    protected $fillable = ['product_id', 'color_id'];
}