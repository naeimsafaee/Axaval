<?php

namespace App\Http\Controllers\Client\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class SingleBlogController extends Controller{

    public function __invoke($slug){

        $slug = str_replace("_", " ", $slug);
        $blog = Blog::query()->where('title', '=', $slug)->first();


        return view('client.blog.single_blog' , compact('blog'));
    }
}
