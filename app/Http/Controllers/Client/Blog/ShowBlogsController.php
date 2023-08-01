<?php

namespace App\Http\Controllers\Client\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class ShowBlogsController extends Controller{
    /**
     * Handle the incoming request.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request){

        $blogs = Blog::query()->paginate(10);

        $total_page = ceil($blogs->total() / $blogs->perPage());
        $current_page = $blogs->currentPage();

        return view('client.blog.show_blogs' , compact('blogs' , 'total_page' , 'current_page'));
    }
}
