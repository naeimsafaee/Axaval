<?php

namespace App\Http\Controllers\Client\ProfileSeller;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Color;
use App\Models\File;
use App\Models\Product;
use App\Models\ProducTag;
use App\Models\ProductToCategory;
use App\Models\ProductToColor;
use App\Models\ProductToFile;
use App\Models\Seller;
use App\Models\SellerProduct;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;
use Validator;

class UploadController extends Controller{

    public function upload(Request $request){


        $validator = Validator::make($request->all(), [
            //            'image' => ['image', 'required', 'mimes:jpeg,jpg,png'],
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpg,jpeg,png',
            'name' => ['required'],
            'colors' => ['required', 'array'],
            'tags' => ['required', 'array'],
            'category_id' => ['required', 'array'],
            'is_free' => ['required', 'string'],
            'price' => ['integer', 'nullable'],
            'type' => ['integer', 'required'],
        ]);
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'There are incorrect values in the form!',
                'errors' => $validator->getMessageBag()->toArray(),
                'data' => $request->all(),

            ], 200);
        }

        $client_id = auth()->guard('clients')->user()->id;

        $price = $request->price;
        if($request->is_free == 0)
            $price = 0;

        $product = Product::query()->create([
            'name' => $request->name,
            'price' => $price,
            'type' => $request->type,
            'views' => 0,
            'is_active' => false,
        ]);


        for($i = 0; $i < count($request->category_id); $i++){

            $category = Category::query()->where('name', '=', str_replace("_", " ", $request->category_id[$i]))->first();
            if(!$category)
                continue;
            ProductToCategory::query()->create([
                'product_id' => $product->id,
                'category_id' => $category->id,
            ]);
        }


        for($i = 0; $i < count($request->tags); $i++){

            $tag = Tag::query()->updateOrCreate(["name" => $request->tags[$i]]);

            ProducTag::query()->create([
                'product_id' => $product->id,
                'tag_id' => $tag->id,
            ]);
        }

        foreach($request->colors as $color){

            ProductToColor::query()->create([
                'product_id' => $product->id,
                'color_id' => $color,
            ]);
        }

        foreach($request->images as $file){

            $fileName = time() . '-' . rand() . '.' . $file->getClientOriginalExtension();
            $water_mark_Name = time() . '-' . rand() . '.' . $file->getClientOriginalExtension();

            Storage::disk('public')->put('files/' . $fileName, file_get_contents($file));
            Storage::disk('public')->put('files/' . $water_mark_Name, file_get_contents($file));

            /*if($ext == 'png'){
                $image = imagepng($file);
            } else if($ext == 'jpg' || $ext == 'jpeg'){
                $image = imagecreatefromjpeg($file);
            }
//            $image_resolution = imageresolution($image);*/

            $image_info = getimagesize($file);

            $size = max($image_info[0], $image_info[1]);
            if($size > 0 && $size <= 1000)
                $size = "کوچک"; elseif($size > 1000 && $size <= 2000)
                $size = "متوسط";
            elseif($size > 2000 && $size <= 3000)
                $size = "بزرگ";
            elseif($size > 3000 && $size <= 4000)
                $size = "4k";
            else
                $size = "5k";

            $water_mark = watermarkPhoto("files/" . $fileName, "storage/files/" . $water_mark_Name, setting('site.watermark'));

            $file = File::query()->create([
                "path" => "files/" . $fileName,
                "thumbnail" => $water_mark,
                'size' => $size,
            ]);

            ProductToFile::query()->create([
                'product_id' => $product->id,
                'file_id' => $file->id,
            ]);

        }

        SellerProduct::query()->create([
            'product_id' => $product->id,
            'seller_id' => Client::query()->find($client_id)->seller->id,
        ]);

        return \response()->json("ok");
    }

    public function __invoke(Request $request){

        $client_id = auth()->guard('clients')->user()->id;

        $seller = Seller::query()->where('client_id' , '=' , $client_id)->firstOrFail();
        if($seller->is_active < 4)
            return redirect()->route('profile');

        $categories = Category::all();
        $colors = Color::all();


        return view('client.profile_seller.upload', compact('categories', 'colors'));
    }
}
