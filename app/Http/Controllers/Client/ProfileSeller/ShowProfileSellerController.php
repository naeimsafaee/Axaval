<?php

namespace App\Http\Controllers\Client\ProfileSeller;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ClientProduct;
use App\Models\Seller;
use Illuminate\Http\Request;

class ShowProfileSellerController extends Controller{

    public function __invoke(Request $request){

        $client_id = auth()->guard('clients')->user()->id;

        $client = Client::query()->find($client_id);

        $seller_sells = [];

        $seller = Seller::query()->where('client_id' , '=' , $client_id)->first();
        $seller_products = $seller->products;

        foreach($seller_products as $product){
            $client_product = ClientProduct::query()->where('product_id' , '=' , $product->id);

            if($client_product && $client_product->count() > 0){
                $product->sell_time = $client_product->first()->created_at;
                $seller_sells[] = $product;
            }

        }

        $transactions = $seller->transactions;



//        die(json_encode($client->products->first()->seller));

        return view('client.profile_seller.show_profile_seller' , compact('client' , 'seller_sells' , 'transactions'));

    }
}
