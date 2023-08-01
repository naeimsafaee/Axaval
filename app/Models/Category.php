<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{

    protected $appends = [
        'slug',
    ];

    public function products(){
        return $this->hasManyThrough(Product::class, ProductToCategory::class, 'product_id', 'id', 'id', 'category_id');
    }

    public function getSlugAttribute(){
        return str_replace(" ", "_", $this->name);
    }

}
