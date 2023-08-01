<?php

namespace App\Http\Controllers\Client\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\HomeGalley;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller{

    public function __invoke(Request $request){
        $is_seller = 0 ;
        if (auth()->guard('clients')->check()){
            $client_id = auth()->guard('clients')->user()->id;
            $client = Client::query()->find($client_id);
            if ($client->is_seller){
                $is_seller = 1 ;
            }
        }
        $last_products = HomeGalley::query()->take(10)->orderByDesc('created_at')->with('product')->get();
        foreach ($last_products as $last){
            $last->product->files;
        }
//        die(json_encode($last_products));
        $categories = Category::all();
        $all_product_count = Product::all()->count();

        return view('client.pages.home' , compact('last_products' , 'all_product_count' , 'categories' , 'is_seller'));
    }
}
