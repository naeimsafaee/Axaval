<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsForm extends Model
{
    protected $fillable = ['name', 'title', 'description'];

}
