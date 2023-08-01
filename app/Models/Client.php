<?php

namespace App\Models;

use App\Channels\FcmChannel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

/**
 * @property mixed phone
 * @property int|mixed verify_code
 * @property mixed|string username
 * @property mixed|string invite_code
 */
class Client extends Authenticatable{
    use HasApiTokens, Notifiable;

    protected $guarded = ['id'];

    protected $appends = ['has_gold_card'];

    public function wallet(){
        return $this->hasOne('App\Models\Wallet');
    }

    public function walletTransactions(){
        return $this->hasMany('App\Models\WalletTransaction')->join('transactions', 'transactions.id', '=', 'wallet_transactions.transaction_id')->orderBy('transactions.transaction_date', 'DESC')->select('wallet_transactions.*');
    }

    public function seller(){
        return $this->hasOne(Seller::class, 'client_id', 'id');
    }

    public function products(){
        return $this->hasManyThrough(Product::class, ClientProduct::class, 'client_id', 'id', 'id', 'product_id');
    }

    public function favorites(){
        return $this->hasManyThrough(Product::class, ClientFavorite::class, 'client_id', 'id', 'id', 'product_id');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class, 'client_id', 'id');
    }

    public function getHasGoldCardAttribute(){
        if(!auth()->guard('clients')->check())
            return false;
        $price = ClientPricing::query()->where([
            'client_id' => auth()->guard('clients')->user()->id,
            'is_active' => true,
            'is_paid' => true,
        ])->where('count', '>', 0);
        return $price->count() > 0 ? $price->first() : false;
    }

}
