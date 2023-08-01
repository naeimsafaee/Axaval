<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductToCategory extends Model{

    protected $fillable = ['product_id' , 'category_id'];

    public function item(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
