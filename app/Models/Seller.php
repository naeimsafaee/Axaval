<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model{

    protected $appends = ['name', 'avatar', 'slug' , 'description'];

    protected $fillable = ['client_id', 'melli_card', 'home_phone' , 'email' , 'verify_code'];

    public function city(){
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function town(){
        return $this->hasOne(Town::class, 'id', 'town_id');
    }

    public function getNameAttribute(){
        return Client::query()->find($this->client_id)->name;
    }

    public function getDescriptionAttribute(){
        return Client::query()->find($this->client_id)->description;
    }

    public function getAvatarAttribute(){
        return Client::query()->find($this->client_id)->avatar;
    }

    public function getSlugAttribute(){
        return str_replace(" ", "_", $this->name);
    }

    public function products(){
        return $this->hasManyThrough(Product::class, SellerProduct::class, 'seller_id', 'id', 'id', 'product_id');
    }

    public function sells(){
        return $this->hasMany(Transaction::class, 'id', 'wallet_transaction_id');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class, 'client_id', 'client_id');
    }

}
