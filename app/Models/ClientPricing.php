<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientPricing extends Model{

    protected $fillable = ['plan_id' , 'ip' , 'client_id' , 'is_active' , 'is_paid' , 'count'];

}
