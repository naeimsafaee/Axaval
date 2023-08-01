<?php

namespace App\Http\Controllers\Client\Search;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use Composer\Config;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class ShowSearchResultController extends Controller{

    private $page_count = 32;

    /**
     * Handle the incoming request.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function __invoke(Request $request){
        $category = Category::all();
        $color = Color::all();


        $products = Product::query();

        if($request->has('search')){
            $products->where('name', 'LIKE', "%" . $request->search . "%");

            $tags = Tag::query()->where('name', 'LIKE', "%" . $request->search . "%")->get();

            if($tags->count() > 0)
                $products->orwhereHas('tags', function(Builder $query) use ($tags){
                    foreach($tags as $tag){
                        $query->Where('tags.id', '=', $tag->id);
                    }
                });
        }

        if($request->has('category')){
            $category_id = Category::query()->where('name', '=', str_replace('_', ' ', $request->category))->firstOrFail()->id;
            $products->whereHas('categories', function(Builder $query) use ($category_id){
                $query->where('categories.id', '=', $category_id);
            });
        }

        if($request->has('color')){
            $color_id = Color::query()->where('title', '=', str_replace('_', ' ', $request->color))->firstOrFail()->id;
            $products->whereHas('colors', function(Builder $query) use ($color_id){
                $query->where('colors.id', '=', $color_id);
            });
        }

        if($request->has('type')){
            $key = array_search($request->type, config('Constants.FILE_TYPE_TRANS'));
            $file_type = config('Constants.FILE_TYPE.' . $key);
            $products->where('type', '=', $file_type);
        }

        $products = $products->where('is_active', '=', true)->with('files');

        $count = $products->count();

        $has_more = $products->count() < $this->page_count ? false : true;

        $products = $products->take($this->page_count)->get();

        //        die(json_encode($products));

        $sizes = \config('Constants.SIZES');

        return view('client.search.search_result', compact('category', 'color', 'products', 'has_more', 'count', 'sizes'));
    }

    /**
     * Handle the incoming request.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search_api(Request $request){

        //        return response()->json($request);
        $products = Product::query();

        if($request->has('search'))
            $products->where('name', 'LIKE', "%" . $request->search . "%");
        if($request->has('category')){
            $category_id = Category::query()->where('name', '=', str_replace('_', ' ', $request->category))->firstOrFail()->id;
            $products->whereHas('categories', function(Builder $query) use ($category_id){
                $query->where('categories.id', '=', $category_id);
            });
        }
        if($request->has('color')){
            $color_id = Color::query()->where('title', '=', str_replace('_', ' ', $request->color))->firstOrFail()->id;
            $products->whereHas('colors', function(Builder $query) use ($color_id){
                $query->where('colors.id', '=', $color_id);
            });
        }
        if($request->has('type')){
            $key = array_search($request->type, config('Constants.FILE_TYPE_TRANS'));
            $file_type = config('Constants.FILE_TYPE.' . $key);
            $products->where('type', '=', $file_type);
        }

        $page = 0;
        if($request->has('page'))
            $page = $request->page;

        $products = $products->with('files');

        $has_more = $products->count() < $this->page_count ? false : true;

        $products = $products->skip($page * $this->page_count)->take($this->page_count)->get();

        //        die(json_encode($products));
        foreach($products as $product){
            $product->files->first()->thumbnail = get_image($product->files->first()->thumbnail);
        }

        return response()->json($products, 200);
    }

}
