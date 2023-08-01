<?php

namespace App\Http\Controllers\Client\Pages;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller{

    public function __invoke(Request $request){

        $faqs = Faq::all();

        return view('client.pages.faq' , compact('faqs'));
    }
}
