<?php

namespace App\Http\Controllers\Client\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use Illuminate\Http\Request;

class ShowPricingController extends Controller{

    public function __invoke(){
        $goldcards = Pricing::all()->groupBy('month');

        return view('client.pages.pricing', compact('goldcards'));
    }
}
