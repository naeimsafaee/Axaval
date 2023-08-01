<?php

namespace App\Http\Controllers\Client\Product;

use App\Http\Controllers\Controller;
use App\Models\ClientFavorite;
use App\Models\ClientProduct;
use App\Models\Product;
use App\Models\ProductToCategory;
use App\Models\SellerProduct;
use http\Client;
use Illuminate\Http\Request;
use function React\Promise\all;

class ShowSingleProductController extends Controller{

    public function __invoke($slug, $id , $size = false){

        $slug = str_replace("_", " ", $slug);
        //$product = Product::query()->where('name', '=', $slug)->first();
        $product = Product::query()->where('id', '=', $id)->first();
        $categories_id = ProductToCategory::query()->where('product_id', '=', $product->id)->select('category_id')->get();
        $related = [];

        foreach($categories_id as $category_id){

            $product_to_categories = ProductToCategory::query()->where('category_id', '=', $category_id->category_id)->get();

            foreach($product_to_categories as $product_to_category){

                $product_1 = Product::query()->find($product_to_category->id);
                if($product_1)
                    if($product_1->is_active)
                        $related[] = $product_1;
            }
        }

        $related = array_unique($related);

        $product->views += 1;
        $product->save();

        $client = false;
        if(auth()->guard('clients')->check())
            $client = auth()->guard('clients')->user();

        $seller_product = SellerProduct::query()->where('product_id', '=', $product->id)->first();

        $is_him = false;
        if($seller_product->seller_id == $product->seller->id)
            $is_him = true;

        $has_buy_this_before = false;
        $is_fav = false;
        if(auth()->guard('clients')->check()){
            $client_product = ClientProduct::query()->where([
                'client_id' => auth()->guard('clients')->user()->id,
                'product_id' => $product->id,
            ])->first();
            if($client_product)
                $has_buy_this_before = true;

            $is_fav = ClientFavorite::query()->where([
                    'client_id' => auth()->guard('clients')->user()->id,
                    'product_id' => $product->id,
                ])->count() > 0;
        }

        $all_buy = ClientProduct::query()->where('product_id', '=', $product->id)->count();
        $download_link = $product->files->first()->path;


        return view('client.product.single_product', compact('product', 'related', 'client', 'is_him', 'download_link', 'has_buy_this_before', 'all_buy', 'is_fav'));
    }

    public function add_bookmark($product_id){

        $product = Product::query()->findOrFail($product_id);

        $client_favorite = ClientFavorite::query()->firstOrCreate([
            'product_id' => $product_id,
            'client_id' => auth()->guard('clients')->user()->id,
        ]);

        if(!$client_favorite->wasRecentlyCreated){
            $client_favorite->delete();
            return response()->json(["از علاقه مندی ها حذف شد"], 200);
        }

        return response()->json(["به علاقه مندی ها اضافه شد"], 200);
    }

}
