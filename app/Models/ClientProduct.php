<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientProduct extends Model
{
    protected $fillable = ['product_id' , 'client_id'];
}
