<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model{

    protected $fillable = ['path' , 'thumbnail' , 'size'];

    public function sizes(){
        return $this->hasManyThrough(Size::class, SizeToFile::class, 'file_id', 'id', 'id', 'size_id');
    }
}
