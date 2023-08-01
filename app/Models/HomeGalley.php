<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeGalley extends Model
{
    protected $fillable = ['product_id'];
    
    public function product()
    {
        return $this->hasOne(Product::class , 'id' , 'product_id');
    }
}
