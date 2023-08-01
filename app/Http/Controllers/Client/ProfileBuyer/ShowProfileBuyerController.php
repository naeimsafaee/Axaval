<?php

namespace App\Http\Controllers\Client\ProfileBuyer;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ClientFavorite;
use Illuminate\Http\Request;

class ShowProfileBuyerController extends Controller{

    /**
     * Handle the incoming request.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request){

        $client = Client::query()->find(auth()->guard('clients')->user()->id);

//        $favorites = ClientFavorite::query()->where('client_id' , '=' , auth()->guard('clients')->user()->id)->get();

        return view('client.profile_buyer.show_profile_buyer' , compact('client'));
    }
}
