<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{

    protected $appends = [
        'slug', 'buy_time' ,'fav_time','type_string'
    ];

    protected $fillable = [
        "name",
        "price",
        'type',
        'views',
        'is_active'
    ];

    public function getIsDiscountedAttribute(){
        return $this->discounted_price != 0;
    }

    public function getSlugAttribute(){
        return str_replace(" ", "_", $this->name);
    }

    public function getBuyTimeAttribute(){
        if(!auth()->guard('clients')->check())
            return "";
        $created_at = ClientProduct::query()->where(['product_id' => $this->id , 'client_id' => auth()->guard('clients')->user()->id])->first();
        if(!$created_at)
            return "";
        $created_at = $created_at->created_at;
        $date = jdate($created_at);
        $date = substr($date, 0, strpos($date, " "));

        $date = explode("-", $date);

        switch($date[1]){
            case 1:
                $date[1] = "فروردین";
                break;
            case 2:
                $date[1] = "اردیبهشت";
                break;
            case 3:
                $date[1] = "خرداد";
                break;
            case 4:
                $date[1] = "تیر";
                break;
            case 5:
                $date[1] = "مرداد";
                break;
            case 6:
                $date[1] = "شهریور";
                break;
            case 7:
                $date[1] = "مهر";
                break;
            case 8:
                $date[1] = "آبان";
                break;
            case 9:
                $date[1] = "آذر";
                break;
            case 10:
                $date[1] = "دی";
                break;
            case 11:
                $date[1] = "بهمن";
                break;
            case 12:
                $date[1] = "اسفند";
                break;
        }

        return fa_number(implode(" ", $date));
    }

    public function getFavTimeAttribute(){
        if(!auth()->guard('clients')->check())
            return "";
        $created_at = ClientFavorite::query()->where(['product_id' => $this->id , 'client_id' => auth()->guard('clients')->user()->id])->first();
        if(!$created_at)
            return "";
        $created_at = $created_at->created_at;
        $date = jdate($created_at);
        $date = substr($date, 0, strpos($date, " "));

        $date = explode("-", $date);

        switch($date[1]){
            case 1:
                $date[1] = "فروردین";
                break;
            case 2:
                $date[1] = "اردیبهشت";
                break;
            case 3:
                $date[1] = "خرداد";
                break;
            case 4:
                $date[1] = "تیر";
                break;
            case 5:
                $date[1] = "مرداد";
                break;
            case 6:
                $date[1] = "شهریور";
                break;
            case 7:
                $date[1] = "مهر";
                break;
            case 8:
                $date[1] = "آبان";
                break;
            case 9:
                $date[1] = "آذر";
                break;
            case 10:
                $date[1] = "دی";
                break;
            case 11:
                $date[1] = "بهمن";
                break;
            case 12:
                $date[1] = "اسفند";
                break;
        }

        return fa_number(implode(" ", $date));
    }

    public function files(){
        return $this->hasManyThrough(
            File::class,
            ProductToFile::class,
            'product_id',
            'id',
            'id',
            'file_id');
    }

    public function colors(){
        return $this->hasManyThrough(
            Color::class,
            ProductToColor::class,
            'product_id',
            'id',
            'id',
            'color_id');
    }

    public function tags(){
        return $this->hasManyThrough(
            Tag::class,
            ProducTag::class,
            'product_id',
            'id',
            'id',
            'tag_id');
    }

    public function categories(){
        return $this->hasManyThrough(Category::class, ProductToCategory::class, 'product_id', 'id', 'id', 'category_id');
    }

    public function seller(){
        return $this->hasOneThrough(Seller::class , SellerProduct::class , 'product_id' , 'id' , 'id' , 'seller_id');
    }

    public function getTypeStringAttribute(){
        if( $this->type == 0)
            return "تصویر";
        elseif( $this->type == 1)
            return "ایلیستریشن";
        else
            return "وکتور";
    }

}
