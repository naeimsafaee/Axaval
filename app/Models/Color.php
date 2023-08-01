<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $appends = [
        'slug',
    ];

    public function getSlugAttribute(){
        return str_replace(" ", "_", $this->title);
    }

}
