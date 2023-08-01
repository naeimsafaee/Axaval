<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestMoney extends Model
{
    protected $fillable=['price' , 'client_id' , 'status'];
}
